<?php

namespace App\Controller;

use App\Helper\JsonHelper;
use App\Model\Pessoa;
use App\Model\Pet;
use App\Repository\PessoaRepository;
use App\Repository\PetRepository;
use App\Router\Controller\Action;

class CivilController extends Action
{
    public function create()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if($data['inputs']['selectCP'] == "Pet"){
            $pet = new Pet();
            $petRepo = new PetRepository();

            $pet->setNome($data['inputs']['nome']);
            $pet->setIdade($data['inputs']['idade']);
            $pet->setRaca($data['inputs']['raca']);
            $pet->setEspecie($data['inputs']['especie']);
            $pet->setInfoAdicional($data['inputs']['info']);
            $pet->setIdLocalAbrigo($data['inputs']['selectLocalCivilPet']);

            if($petRepo->insert($pet)){
                echo JsonHelper::toJson(['status' => 'sucesso']);
                header('location: /');
            }
        }

        if($data['inputs']['selectCP'] == "Civil"){

            $pessoa = new Pessoa();
            $pessoaRepo = new PessoaRepository();

            $pessoa->setNome($data['inputs']['nome']);
            $pessoa->setIdade($data['inputs']['idade']);
            $pessoa->setInfoAdicional($data['inputs']['info']);
            $pessoa->setIdLocalAbrigo($data['inputs']['selectLocalCivilPet']);

            if($pessoaRepo->insert($pessoa)){
                echo JsonHelper::toJson(['status' => 'sucesso']);
            }

        }
    }

    public function verPessoas()
    {

        $viewPessoas = new PessoaRepository();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $pessoas = $viewPessoas->getPessoaPorPagina($total_registros, $deslocamento);
        $totalPessoaAbrigo = $viewPessoas->getTotalPessoas();
        $this->view->totalPaginas = ceil($totalPessoaAbrigo/$total_registros);
        $this->view->paginaAtiva = $pagina;
        $this->view->totalPessoas = $totalPessoaAbrigo;
        
        //$array = $viewItens->getAll();
        $this->view->pessoas = $pessoas;
        
        $this->render('ver-pessoas');
    }

    public function verPets()
    {
        $viewPets = new PetRepository();

        $total_registros = 10;

        $pagina = isset($pagina) ? $pagina : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $pets = $viewPets->getPetPorPagina($total_registros, $deslocamento);
        $totalPetAbrigo = $viewPets->getTotalPets();
        $this->view->totalPaginas = ceil($totalPetAbrigo/$total_registros);
        $this->view->paginaAtiva = $pagina;
        $this->view->totalPets = $totalPetAbrigo;
        
        //$array = $viewItens->getAll();
        $this->view->pets = $pets;
        
        $this->render('ver-pets');
    }
}