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
        $sql = "INSERT INTO local_abrigo (nome, logradouro, numero, bairro, cidade, uf, vagas, telefone, tipo, dtcadastro) VALUES (:nome, :logradouro, :numero, :bairro, :cidade, :uf, :vagas, :telefone, :tipo, NOW())";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':logradouro', $model->getLogradouro());
        $this->connection->bind(':numero', $model->getNumero());
        $this->connection->bind(':bairro', $model->getBairro());
        $this->connection->bind(':cidade', $model->getCidade());
        $this->connection->bind(':uf', $model->getUf());
        $this->connection->bind(':vagas', $model->getVagas());
        $this->connection->bind(':telefone', $model->getTelefone());
        $this->connection->bind(':tipo', $model->getTipo());
        return $this->connection->execute();
    }

    public function filtroPorAbrigo(string $filtro)
    {
        $sql = "SELECT nome, logradouro, numero, bairro , cidade, uf,  tipo, vagas, telefone,  dtcadastro
        FROM local_abrigo";
        $sql .= " WHERE (nome LIKE :nome OR cidade LIKE :cidade) AND tipo = 'civil' ";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', '%'.$filtro.'%');
        $this->connection->bind(':cidade', '%'.$filtro.'%');
        return $this->connection->rs();

    }

    public function filtroPetPorAbrigo(string $filtro)
    {
        $sql = "SELECT nome, logradouro, numero, bairro , cidade, uf, tipo, vagas, telefone,  dtcadastro
        FROM local_abrigo";
        $sql .= " WHERE (nome LIKE :nome OR cidade LIKE :cidade) AND tipo = 'pet' ";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', '%'.$filtro.'%');
        $this->connection->bind(':cidade', '%'.$filtro.'%');
        return $this->connection->rs();

    }

    public function getAbrigoPorPagina(int $limite, int $offset, $where = false)
    {
        $sql = "
            SELECT nome, logradouro, numero, bairro, cidade, uf, tipo, vagas, telefone,  dtcadastro 
            FROM local_abrigo WHERE tipo = 'civil' 
            ORDER BY dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getAbrigoPetsPorPagina(int $limite, int $offset, $where = false)
    {
        $sql = "
            SELECT nome, logradouro, numero, bairro, cidade, uf, tipo, vagas, telefone, dtcadastro 
            FROM local_abrigo WHERE tipo = 'pet'  
            ORDER BY dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAllAbrigo()
    {
        $sql = "SELECT idlocal_abrigo, nome, vagas, telefone, tipo FROM local_abrigo";
        $sql .= " WHERE tipo = 'civil'"; 
        $sql .= " GROUP BY nome "; 
        
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAllAbrigoPet()
    {
        $sql = "SELECT idlocal_abrigo, nome, vagas, telefone, tipo FROM local_abrigo";
        $sql .= " WHERE tipo = 'pet'"; 
        $sql .= " GROUP BY nome "; 
    
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAll()
    {
        $sql = "SELECT idlocal_abrigo, nome, logradouro, numero, bairro, cidade, uf, vagas, telefone, tipo, dtcadastro FROM local_abrigo";
        $sql .= " ORDER BY cidade"; 
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalAbrigos()
    {
        $sql = "SELECT COUNT(*) as total FROM local_abrigo";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }

    public function getTotalAbrigoPets()
    {
        $sql = "SELECT COUNT(*) as total FROM local_abrigo WHERE tipo = 'pet' ";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }


}