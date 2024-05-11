<?php

namespace App\Controller;

use App\Helper\DateTimeHelper;
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

        $data = json_decode(file_get_contents("php://input"), true);
        $novoAbrigo = new LocalAbrigo();

        $novoAbrigo->setNome(ucwords($data['inputs']['nome']));
        $novoAbrigo->setLogradouro(ucwords($data['inputs']['logradouro']));
        $novoAbrigo->setNumero($data['inputs']['numero']);
        $novoAbrigo->setBairro(ucwords($data['inputs']['bairro']));
        $novoAbrigo->setCidade(ucwords($data['inputs']['cidade']));
        $novoAbrigo->setUf($data['inputs']['uf']);
        $novoAbrigo->setVagas($data['inputs']['vaga']);
        $novoAbrigo->setTelefone($data['inputs']['telefone']);

        $localDoacaoRepo = new LocalAbrigoRepository();

        $localDoacaoRepo->insertAbrigo($novoAbrigo);

        header('location: /');
    }

    public function verAbrigos()
    {
        $viewLocaisAbrigos = new LocalAbrigoRepository();

        $total_registros = 10;

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $abrigos = $viewLocaisAbrigos->pegarAbrigoPorPagina($total_registros, $deslocamento);
        $totalLocaisAbrigos = $viewLocaisAbrigos->totalAbrigo();
        $this->view->totalPaginas = ceil($totalLocaisAbrigos/$total_registros);
        $this->view->paginaAtiva = $pagina;
        
        //$array = $viewItens->getAll();
        $this->view->abrigos = $abrigos;
        $this->render('local-abrigo');
    }

    public function filtroAbrigo()
    {
        $filtroLocais = new LocalAbrigoRepository();

        $filtro = filter_input(INPUT_POST, 'filtro_abrigo');

        $dados = $filtroLocais->filtroPorAbrigo($filtro);
        
        echo JsonHelper::toJson($dados);
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
            ->setCellValue('G1', 'Vagas')
            ->setCellValue('H1', 'TELEFONE')
            ->setCellValue('I1', 'Cadastrado em');

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

        header('location :/ver-abrigos');
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