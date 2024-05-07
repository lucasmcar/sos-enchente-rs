<?php 

namespace App\Dao;


use App\Connection\ConnectionInstance;
use App\Model\ItensDoacao;


class ItensDoacaoDao
{
    private $connection;

    public function __construct()
    {   
        $this->connection = ConnectionInstance::getInstance();
    }

    public function insert(ItensDoacao $model) : int
    {
        $sql = "INSERT INTO itens_doacao (nome, tipo, quantidade, dt_cadastro) VALUES (:nome, :tipo, :quantidade, NOW())";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':tipo', $model->getTipo());
        $this->connection->bind(':quantidade', $model->getQuantidade());
        $this->connection->bind(':dtcadastro', $model->getDtCadastro());
        return $this->connection->execute();
        
    }

    public function selectAll(string $orderBy = "ASC") : array | null
    {
        $sql = "SELECT nome, tipo, quantidade FROM itens_doacao";
        if(isset($orderBy)){
            $sql .= " ORDER BY modelo ".$orderBy; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;

    }

    public function selectInfoCarrosCliente(int $idCliente) : array | null
    {
        $sql = "SELECT idveiculo, modelo, placa, cor, ano, marca FROM veiculo WHERE idcliente = :idcliente";
        $this->connection->prepare($sql);
        $this->connection->bind(':idcliente', $idCliente);
        $resultado = $this->connection->rs();
        return $resultado;
    } 

    

    public function delete(string $placa) : bool
    {
        $sql = "DELETE FROM veiculo WHERE placa = :placa";
        $this->connection->prepare($sql);
        $this->connection->bind(':placa', $placa);
        return $this->connection->execute();
    }

    /*public function softDelete(Carro $model) : bool
    {
        $sql = "UPDATE veiculo SET dt_deletado = :dtdeletado WHERE placa = :placa";
        $this->connection->prepare($sql);
        $this->connection->bind(':placa', $model->getPlaca());
        $this->connection->bind(':dtdeletado', $model->getDtDeletado());
        return $this->connection->execute();
    }*/

    public function getTotalItens()
    {
        $sql = "SELECT COUNT(*) as total FROM itens_doacao";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }
}