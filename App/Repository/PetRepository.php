<?php

namespace App\Repository;

use App\Model\Pet;
use App\Dao\PetDao;

class PetRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new PetDao();
    }

    public function insert(Pet $pet)
    {
        return $this->dao->insert($pet);
    }

    public function returnAll(string $orderBy = 'ASC')
    {
        return $this->dao->returnAll($orderBy);
    }

    public function getPetPorPagina(int $limite, int $offset)
    {
        return $this->dao->getPetPorPagina($limite, $offset);
    }

    public function getTotalPets()
    {
        return $this->dao->getTotalPet();
    }
}
