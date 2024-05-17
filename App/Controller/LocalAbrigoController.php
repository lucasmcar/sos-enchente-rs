<?php

namespace App\Controller;

use App\Helper\DateTimeHelper;
use App\Helper\InputFilterHelper;
use App\Model\LocalAbrigo;
use App\Repository\LocalAbrigoRepository;
use App\Router\Controller\Action;
use App\Helper\JsonHelper;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class LocalAbrigoController extends Action
{

    public function create()
    {

        $data = InputFilterHelper::filterInputs(INPUT_POST, [
            'nome', 'logradouro', 
            'numero', 'bairro', 
            'cidade', 'uf', 
            'selected', 'vaga', 
            'telefone'
        ]);

        $novoAbrigo = new LocalAbrigo();

        $novoAbrigo->setNome(ucwords($data['nome']));
        $novoAbrigo->setLogradouro(ucwords($data['logradouro']));
        $novoAbrigo->setNumero($data['numero']);
        $novoAbrigo->setBairro(ucwords($data['bairro']));
        $novoAbrigo->setCidade(ucwords($data['cidade']));
        $novoAbrigo->setUf($data['uf']);
        $novoAbrigo->setTipo($data['selected']);
        $novoAbrigo->setVagas($data['vaga']);
        $novoAbrigo->setTelefone($data['telefone']);

        $localDoacaoRepo = new LocalAbrigoRepository();

        $localDoacaoRepo->insertAbrigo($novoAbrigo);

        header('location: /');
    }

    public function verAbrigos($pagina)
    {
        $viewLocaisAbrigos = new LocalAbrigoRepository();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $abrigos = $viewLocaisAbrigos->pegarAbrigoPorPagina($total_registros, $deslocamento);
        $totalLocaisAbrigos = $viewLocaisAbrigos->totalAbrigo();
        $this->view->totalPaginas = ceil($totalLocaisAbrigos/$total_registros);
        $this->view->paginaAtiva = $pagina;

        
        $this->view->abrigos = $abrigos;
        $this->render('local-abrigo');
    }

    public function verAbrigosPets($pagina)
    {

        $viewLocaisAbrigoPets = new LocalAbrigoRepository();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;
        

        $abrigos = $viewLocaisAbrigoPets->pegarAbrigoPetsPorPagina($total_registros, $deslocamento);
        $totalLocaisAbrigosPets = $viewLocaisAbrigoPets->totalAbrigoPets();
        $this->view->totalPaginas = ceil($totalLocaisAbrigosPets/$total_registros);
        $this->view->paginaAtiva = $pagina;
       
        $this->view->abrigoPets = $abrigos;
        $this->render('local-abrigo-pet');    
    }



    public function filtroAbrigo($filtro)
    {
        $filtroLocais = new LocalAbrigoRepository();

        $dados = $filtroLocais->filtroPorAbrigo($filtro);
        
        echo JsonHelper::toJson($dados);
    }

    public function filtroPetAbrigo($filtro)
    {
        $filtroLocaisPets = new LocalAbrigoRepository();

        $dados = $filtroLocaisPets->filtroPetPorAbrigo($filtro);
        
        echo JsonHelper::toJson($dados);
    }

    public function verPessoas()
    {
        $this->render('ver-pessoas');
    }

    public function convertToExcel()
    {

        $itens = new LocalAbrigoRepository();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('SoSEnchete')
            ->setTitle('Documento local de doação')
            ->setSubject('Documento local de doação')
            ->setDescription('Documento que mostra os locais de doação')
            ->setKeywords('local doação')
            ->setCategory('');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nome')
            ->setCellValue('B1', 'Logradouro')
            ->setCellValue('C1', 'Numero')
            ->setCellValue('D1', 'Bairro')
            ->setCellValue('E1', 'Cidade')
            ->setCellValue('F1', 'UF')
            ->setCellValue('G1', 'TIPO')
            ->setCellValue('H1', 'Vagas')
            ->setCellValue('I1', 'TELEFONE')
            ->setCellValue('J1', 'Cadastrado em');

        $data = $itens->selectAll();

        $row = 2;

        foreach($data as $rowData){
            $sheet->fromArray($rowData, null, 'A'.$row);
            $row++;
        }

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="abrigos.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');

        header('location: /ver-abrigos');
        exit;
    }

    public function convertToPdf()
    {
        
        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $itens = new LocalAbrigoRepository();

        $data = $itens->selectAll();
        // Conteúdo HTML que você deseja converter em PDF
        $html = '
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    ul {list-style: none; margin-top:12px;}
                    ul  li {
                        display: flex; 
                        flex-direction: column;
                        margin-bottom:8px;
                        justify-content: center;
                        align-items: center;

                    }
                    body { font-family: Arial, sans-serif; }
                    .container{ padding: 16px; }
                    .wrapper{ 
                        box-sizing: border-box; 
                        background: #90EE90;
                        color: white;
                        padding:16px;
                    }
                    .list-wrapper{
                        margin-bottom:8px;
                        box-sizing: border-box; 
                        display: flex;
                        border: 1px solid #00ff0080;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                    }
                    h1 { color: white; }

                    p { font-size: 14px; }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="wrapper">
                        <h1>SOS Enchente - RS </h1>
                        <h3>Locais de abrigos</h3>
                        <p>Listagem de abrigos e vagas disponíveis</p>
                    </div>
                    <div class="list-wrapper">
                    <ul>';
                        foreach($data as $dataRow){
                            $html .= sprintf(
                                "<li>%s\t-\t%s\t-\t%s\t-\t%s\t-\t%s</li>", 
                                $dataRow['nome'], 
                                $dataRow['logradouro'],
                                $dataRow['numero'], 
                                $dataRow['bairro'], 
                                $dataRow['cidade'], 
                                $dataRow['uf'], 
                                $dataRow['tipo'], 
                                $dataRow['vagas'], 
                                $dataRow['telefone'], 
                                DateTimeHelper::toNormalFormat($dataRow['dtcadastro']
                            )); 
                        }
                    '</ul>
                    </div>                    
                    
                </div>
            </body>
        </html>
        ';

        // Carregue o HTML no DOMPDF
        $dompdf->loadHtml($html);

        // Renderize o PDF
        $dompdf->render();

        // Saída do PDF para o navegador
        $dompdf->stream("abrigos-".date("d-m-Y").".pdf", array('Attachment' => true));

        header('location :/ver-abrigos');
        exit;
    } 
}