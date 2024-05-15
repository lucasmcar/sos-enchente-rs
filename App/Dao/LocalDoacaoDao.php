<?php 

namespace App\Dao;

use App\Connection\Connection;
use App\Model\LocalDoacao;

class LocalDoacaoDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function insert(LocalDoacao $model)
    {
        $sql = "INSERT INTO local_doacao (nome, logradouro, numero, bairro, cidade, uf, telefone, dtcadastro) VALUES (:nome, :logradouro, :numero, :bairro, :cidade, :uf, :telefone, NOW())";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':logradouro', $model->getLogradouro());
        $this->connection->bind(':numero', $model->getNumero());
        $this->connection->bind(':bairro', $model->getBairro());
        $this->connection->bind(':cidade', $model->getCidade());
        $this->connection->bind(':uf', $model->getUf());
        $this->connection->bind(':telefone', $model->getTelefone());
        return $this->connection->execute();
    }

    public function filtroPorLocal(string $filtro)
    {
        $sql = "SELECT nome, logradouro, numero, bairro , cidade, uf, telefone, dtcadastro
        FROM local_doacao";
        $sql .= " WHERE nome LIKE :nome OR cidade LIKE :cidade";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', '%'.$filtro.'%');
        $this->connection->bind(':cidade', '%'.$filtro.'%');
        return $this->connection->rs();

    }

    public function getLocalPorPagina(int $limite, int $offset)
    {
        $sql = "
            SELECT nome, logradouro, numero, bairro, cidade, uf, telefone, dtcadastro 
            FROM local_doacao 
            ORDER BY dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAllLocal()
    {
        $sql = "SELECT idlocaldoacao, nome, telefone FROM local_doacao";
        if(isset($orderBy)){
            $sql .= " GROUP BY nome "; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function returnAll()
    {
        $sql = "SELECT nome, logradouro, numero, bairro, cidade, uf, telefone, dtcadastro FROM local_doacao";
        $sql .= " ORDER BY cidade"; 
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalLocal()
    {
        $sql = "SELECT COUNT(*) as total FROM local_doacao";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }

    public function getItensPorCidade()
    {
        $sql = "SELECT l.cidade, sum(d.quantidade) as total from local_doacao l join itens_doacao d on l.idlocaldoacao = d.idlocaldoacao group by l.cidade";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getItensPorLocal()
    {
        $sql = "SELECT l.nome, sum(d.quantidade) as total from local_doacao l join itens_doacao d on l.idlocaldoacao = d.idlocaldoacao group by l.nome";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }
}