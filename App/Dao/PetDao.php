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
        $sql = "INSERT INTO pet (nome, idade, raca, especie, info_adicional, dtcadastro, idabrigo) VALUES (:nome, :idade, :raca, :especie, :info_adicional, NOW(), :idabrigo)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':idade', intval($model->getIdade()));
        $this->connection->bind(':raca', intval($model->getRaca()));
        $this->connection->bind(':especie', intval($model->getEspecie()));
        $this->connection->bind(':info_adicional', $model->getInfoAdicional());
        $this->connection->bind(':idabrigo', intval($model->getIdLocalAbrigo()));
        return $this->connection->execute();
        
    }

    public function returnAll(string $orderBy = 'ASC') : array 
    {
        $sql = "SELECT p.nome, p.idade, p.raca, p.especie, p.info_adicional, d.dtcadastro , l.nome as nome_local 
        FROM pet p 
        INNER JOIN abrigo a ON p.idabrigo = a.idabrigo
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
            SELECT p.nome, p.idade, p.raca, p.especie, p.dtcadastro, p.info_adicional, p.idabrigo, a.nome as nome_abrigo, a.logradouro, a.numero
            FROM pet p
            INNER JOIN abrigo a ON p.idabrigo = a.idabrigo 
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