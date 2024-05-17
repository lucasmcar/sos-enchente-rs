<?php

namespace App\Dao;
use App\Connection\Connection;

use App\Model\Pet;

class PetDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();    
    }

    public function insert(Pet $model)
    {
        $sql = "INSERT INTO pet (nome, idade, raca, especie, info_adicional, imagem, dtcadastro, idlocal_abrigo) VALUES (:nome, :idade, :raca, :especie, :info_adicional, :imagem, NOW(), :idlocal_abrigo)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':idade', intval($model->getIdade()));
        $this->connection->bind(':raca',$model->getRaca());
        $this->connection->bind(':especie', $model->getEspecie());
        $this->connection->bind(':info_adicional', $model->getInfoAdicional());
        $this->connection->bind(':imagem', $model->getImagemPath());
        $this->connection->bind(':idlocal_abrigo', intval($model->getIdLocalAbrigo()));
        return $this->connection->execute();
        
    }

    public function returnAll(string $orderBy = 'ASC') : array 
    {
        $sql = "SELECT p.nome, p.idade, p.raca, p.especie, p.info_adicional, p.imagem, d.dtcadastro , l.nome as nome_local 
        FROM pet p 
        INNER JOIN local_abrigo a ON p.idlocal_abrigo = a.idlocal_abrigo
        ";
        if(isset($orderBy)){
            $sql .= " ORDER BY quantidade ".$orderBy; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getPetPorPagina($limite, $offset)
    {
        $sql = "
            SELECT p.nome, p.idade, p.raca, p.especie, p.dtcadastro, p.info_adicional, p.imagem, p.idlocal_abrigo, a.nome as nome_abrigo, a.logradouro, a.numero
            FROM pet p
            INNER JOIN local_abrigo a ON p.idlocal_abrigo = a.idlocal_abrigo 
            ORDER BY p.dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalPet()
    {
        $sql = "SELECT COUNT(*) as total FROM pet";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }
}