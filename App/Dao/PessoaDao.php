<?php

namespace App\Dao;
use App\Connection\Connection;
use App\Model\Pessoa;

class PessoaDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();    
    }

    public function insert(Pessoa $model)
    {
        $sql = "INSERT INTO pessoa (nome, idade, info_adicional, dtcadastro, idabrigo) VALUES (:nome, :idade, :info_adicional, NOW(), :idabrigo)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':idade', intval($model->getIdade()));
        $this->connection->bind(':info_adicional', $model->getInfoAdicional());
        $this->connection->bind(':idabrigo', intval($model->getIdLocalAbrigo()));
        return $this->connection->execute();
        
    }

    public function returnAll(string $orderBy = 'ASC') : array 
    {
        $sql = "SELECT p.nome, p.idade, p.info_adicional, d.dtcadastro , l.nome as nome_local 
        FROM pessoa p 
        INNER JOIN abrigo a ON p.idabrigo = a.idabrigo
        ";
        if(isset($orderBy)){
            $sql .= " ORDER BY quantidade ".$orderBy; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getPessoaPorPagina($limite, $offset)
    {
        $sql = "
            SELECT p.nome, p.idade, p.dtcadastro, p.info_adicional, p.idabrigo, a.nome as nome_abrigo, a.logradouro, a.numero
            FROM pessoa p
            INNER JOIN abrigo a ON p.idabrigo = a.idabrigo 
            ORDER BY p.dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalPessoas()
    {
        $sql = "SELECT COUNT(*) as total FROM pessoa";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }
}