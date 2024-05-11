<?php

namespace App\Dao;

use App\Connection\Connection;
use App\Model\LocalAbrigo;

class LocalAbrigoDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function insert(LocalAbrigo $model)
    {
        $sql = "INSERT INTO abrigo (nome, logradouro, numero, bairro, cidade, uf, vagas, telefone, dtcadastro) VALUES (:nome, :logradouro, :numero, :bairro, :cidade, :uf, :vagas, :telefone, NOW())";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':logradouro', $model->getLogradouro());
        $this->connection->bind(':numero', $model->getNumero());
        $this->connection->bind(':bairro', $model->getBairro());
        $this->connection->bind(':cidade', $model->getCidade());
        $this->connection->bind(':uf', $model->getUf());
        $this->connection->bind(':vagas', $model->getVagas());
        $this->connection->bind(':telefone', $model->getTelefone());
        return $this->connection->execute();
    }

    public function filtroPorAbrigo(string $filtro)
    {
        $sql = "SELECT nome, logradouro, numero, bairro , cidade, uf, vagas, telefone, dtcadastro
        FROM abrigo";
        $sql .= " WHERE nome LIKE :nome OR cidade LIKE :cidade";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', '%'.$filtro.'%');
        $this->connection->bind(':cidade', '%'.$filtro.'%');
        return $this->connection->rs();

    }

    public function getAbrigoPorPagina(int $limite, int $offset)
    {
        $sql = "
            SELECT nome, logradouro, numero, bairro, cidade, uf, vagas, telefone, dtcadastro 
            FROM abrigo 
            ORDER BY dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAllAbrigo()
    {
        $sql = "SELECT idabrigo, nome, vagas, telefone FROM abrigo";
        if(isset($orderBy)){
            $sql .= " GROUP BY nome "; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAll()
    {
        $sql = "SELECT nome, logradouro, numero, bairro, cidade, uf, vagas, telefone, dtcadastro FROM abrigo";
        $sql .= " ORDER BY cidade"; 
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalAbrigos()
    {
        $sql = "SELECT COUNT(*) as total FROM abrigo";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }


}