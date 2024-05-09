<?php 

namespace App\Dao;


use App\Connection\ConnectionInstance;
use App\Helper\JsonHelper;
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
        $sql = "INSERT INTO itens_doacao (nome, quantidade, dtcadastro, idtipo_doacao) VALUES (:nome, :quantidade, NOW(), :idtipo_doacao)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':idtipo_doacao', $model->getTipo());
        $this->connection->bind(':quantidade', $model->getQuantidade());
        return $this->connection->execute();
        
    }

    public function returnAllTypes()
    {
        $sql = "SELECT idtipo_doacao, nome FROM tipo_doacao";
        if(isset($orderBy)){
            $sql .= " ORDER BY nome ".$orderBy; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function selectAll(string $orderBy = "ASC") : array | string
    {
        $sql = "SELECT d.nome, d.idtipo_doacao, d.quantidade, d.dtcadastro , t.nome as nome_tipo 
        FROM itens_doacao d 
        INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao
        INNER JOIN local_doacao l ON d.id
        ";
        if(isset($orderBy)){
            $sql .= " ORDER BY quantidade ".$orderBy; 
        }
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;

    }

    public function filtroPorNome(string $nome)
    {
        $sql = "SELECT d.nome, d.idtipo_doacao, d.quantidade, d.dtcadastro , t.nome as nome_tipo 
        FROM itens_doacao d 
        INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao";
        $sql .= " WHERE d.nome LIKE :nome";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', '%'.$nome.'%');
        return $this->connection->rs();

    }


    public function delete(string $placa) : bool
    {
        $sql = "DELETE FROM veiculo WHERE placa = :placa";
        $this->connection->prepare($sql);
        $this->connection->bind(':placa', $placa);
        return $this->connection->execute();
    }

    public function getItemPorPagina($limite, $offset)
    {
        $sql = "
            SELECT d.nome, d.idtipo_doacao, d.quantidade, d.dtcadastro , t.nome as nome_tipo 
            FROM itens_doacao d 
            INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao ORDER BY d.dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
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