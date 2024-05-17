<?php

namespace App\Controller;

use App\Helper\DateTimeHelper;
use App\Helper\InputFilterHelper;
use App\Helper\JsonHelper;
use App\Model\ItensDoacao;
use App\Repository\ItensDoacaoRepository;
use App\Repository\LocalDoacaoRepository;
use App\Router\Controller\Action;

use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ItensDoacaoController extends Action
{
    public function create()
    {

        $data = InputFilterHelper::filterInputs(INPUT_POST, [
            'nome', 'quantidade', 'selectLocal', 'select'
        ]);

        $novoItem = new ItensDoacao();

        $novoItem->setNome(ucwords($data['nome']));
        $novoItem->setTipo($data['select']);
        $novoItem->setLocal($data['selectLocal']);
        $novoItem->setQuantidade(intval($data['quantidade']));

        $registroItens = new ItensDoacaoRepository();

        $registroItens->create($novoItem);
       
        echo JsonHelper::toJson(['status' => 'sucesso']);
        
    }

    public function verDoacoes($pagina)
    {

        $repo = new ItensDoacaoRepository();
        //$localDoacaoRepo = new LocalDoacaoRepository();

        //Traz os dados necessarios para os itens dos selects
        /*$arrayTypes = $repo->returnAllTypes();
        $arrayLocals = $localDoacaoRepo->returnAllLocal();*/
        
        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $itens = $repo->pegarItensPorPagina($total_registros, $deslocamento);
        $totalItens = $repo->totalItens();
        
        $this->view->totalPaginas = ceil($totalItens/$total_registros);
        $this->view->paginaAtiva = $pagina;
        
        /*$this->view->dataSelectLocalV = $arrayLocals;
        $this->view->dataSelectV = $arrayTypes;*/

        $this->view->itens = $itens;

        $this->render('itens');
    }

    public function filtroDoacoes($filtro)
    {
        $filtroDoacaoRepo = new ItensDoacaoRepository();

        $dados = $filtroDoacaoRepo->filtroPorNome($filtro);
        
        echo JsonHelper::toJson($dados);
    }

    public function convertToExcel()
    {

        $itens = new ItensDoacaoRepository();
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
            ->setCellValue('G1', 'TELEFONE')
            ->setCellValue('H1', 'Cadastrado em');

        $data = $itens->getAll();

        $row = 2;

        foreach($data as $rowData){
            $sheet->fromArray($rowData, null, 'A'.$row);
            $row++;
        }

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="doacoes.xls"');
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

        header('location :/ver-locais');
        exit;


    }

    public function convertToPdf()
    {
        
        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $itens = new ItensDoacaoRepository();

        $data = $itens->getAll();
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
                        <h3>Doações Necessárias</h3>
                        <p>Listagem de doações e locais que estão precisando</p>
                    </div>
                    <div class="list-wrapper">
                    <ul>';
                        foreach($data as $dataRow){
                            $html .= sprintf(
                                "<li>%s\t-\t%s\t-\t%s\t-\t%s\t-\t%s</li>", 
                                $dataRow['nome'], 
                                $dataRow['nome_tipo'],
                                $dataRow['quantidade'], 
                                $dataRow['nome_local'], 
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
        $dompdf->stream("doacoes".date("d-m-Y").".pdf", array('Attachment' => true));

        header('location :/ver-locais');
        exit;
    }
}