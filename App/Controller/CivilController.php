<?php

namespace App\Controller;

use App\Helper\InputFilterHelper;
use App\Helper\JsonHelper;
use App\Model\Pessoa;
use App\Model\Pet;
use App\Repository\PessoaRepository;
use App\Repository\LocalAbrigoRepository;
use App\Repository\PetRepository;
use App\Router\Controller\Action;

class CivilController extends Action
{
    public function create()
    {
        $data = InputFilterHelper::filterInputs(
            INPUT_POST, [
                'nome_civil',
                'idade_civil',
                'pet_civil',
                'especie',
                'raca',
                'area_info',
                'local_pet_civil']
        );


        if($data['pet_civil'] == "Pet"){
            $pet = new Pet();
            $petRepo = new PetRepository();

            $pet->setNome($data['nome_civil']);
            $pet->setIdade($data['idade_civil']);
            $pet->setRaca($data['raca']);
            $pet->setEspecie($data['especie']);
            $pet->setInfoAdicional($data['area_info']);
            $pet->setIdLocalAbrigo($data['local_pet_civil']);

            if(isset($_FILES['foto'])){
                $foto = $_FILES['foto'];
                
                $destino = $_SERVER['DOCUMENT_ROOT'] . '\\assets\\imgs\\uploads\\'.str_replace(" ", "-",$pet->getNome())."\\";

                $check = getimagesize($foto["tmp_name"]);


                
                if($check !== false){
                    if(!is_dir($destino)){
                        mkdir($destino, 0777, true);
                    }
                    
                    $path = $destino.$foto['name'];
                    move_uploaded_file($foto['tmp_name'],$path);
                    $path = str_replace($_SERVER['DOCUMENT_ROOT'], "",$destino).$foto['name'];
                }
                
                $pet->setImagemPath($path);
                
            }


            if($petRepo->insert($pet)){
                echo JsonHelper::toJson(['status' => 'sucesso']);
                
            }
        }

        if($data['pet_civil'] == "Civil"){

            $pessoa = new Pessoa();
            $pessoaRepo = new PessoaRepository();

            $pessoa->setNome($data['nome_civil']);
            $pessoa->setIdade($data['idade_civil']);
            $pessoa->setInfoAdicional($data['area_info']);
            $pessoa->setIdLocalAbrigo($data['local_pet_civil']);

            if(isset($_FILES['foto'])){
                $foto = $_FILES['foto'];
                
                $destino = $_SERVER['DOCUMENT_ROOT'] . '\\assets\\imgs\\uploads\\'.str_replace(" ", "-",$pessoa->getNome())."\\";

                $check = getimagesize($foto["tmp_name"]);


                
                if($check !== false){
                    if(!is_dir($destino)){
                        mkdir($destino, 0777, true);
                    }
                    
                    $path = $destino.$foto['name'];
                    move_uploaded_file($foto['tmp_name'],$path);
                    $path = str_replace($_SERVER['DOCUMENT_ROOT'], "",$destino).$foto['name'];
                }
                
                $pessoa->setImagemPath($path);
                
            }

            if($pessoaRepo->insert($pessoa)){
                echo JsonHelper::toJson(['status' => 'sucesso']);
            }
        }
    }

    public function verPessoas()
    {
        $localAbrigo = new LocalAbrigoRepository();

        $viewPessoas = new PessoaRepository();
        $arrayLocalAbrigo = $localAbrigo->returnAllAbrigo();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $pessoas = $viewPessoas->getPessoaPorPagina($total_registros, $deslocamento);
        $totalPessoaAbrigo = $viewPessoas->getTotalPessoas();
        $this->view->totalPaginas = ceil($totalPessoaAbrigo/$total_registros);
        $this->view->paginaAtiva = $pagina;
        $this->view->totalPessoas = $totalPessoaAbrigo;
        $this->view->dataSelectAbrigo = $arrayLocalAbrigo;
        
        //$array = $viewItens->getAll();
        $this->view->pessoas = $pessoas;
        
        $this->render('ver-pessoas');
    }

    public function verPets()
    {
        $viewPets = new PetRepository();
        $viewLocaisAbrigoPets = new LocalAbrigoRepository();
        $arrayAbrigos = $viewLocaisAbrigoPets->returnAllAbrigoPet();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $pets = $viewPets->getPetPorPagina($total_registros, $deslocamento);
        $totalPetAbrigo = $viewPets->getTotalPets();
        $this->view->totalPaginas = ceil($totalPetAbrigo/$total_registros);
        $this->view->paginaAtiva = $pagina;
        $this->view->totalPets = $totalPetAbrigo;
        $this->view->dataSelectAbrigoPet = $arrayAbrigos;

        
        //$array = $viewItens->getAll();
        $this->view->pets = $pets;
        
        $this->render('ver-pets');
    }
}