<?php 

namespace App\Dao;

use App\Connection\Connection;
use App\Helper\JsonHelper;
use App\Model\ItensDoacao;

class ItensDoacaoDao
{
    private $connection;

    public function __construct()
    {   
        $this->connection = new Connection();
    }

    public function insert(ItensDoacao $model) : int
    {
        $sql = "INSERT INTO item_doacao (nome, quantidade, idlocal_doacao, dtcadastro, idtipo_doacao) VALUES (:nome, :quantidade, :idlocal_doacao, NOW(), :idtipo_doacao)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':idtipo_doacao', $model->getTipo());
        $this->connection->bind(':idlocal_doacao', $model->getLocal());
        $this->connection->bind(':quantidade', $model->getQuantidade());
        return $this->connection->execute();
        
    }

    public function returnAllTypes()
    {
        $sql = "SELECT idtipo_doacao, nome FROM tipo_doacao";
        $sql .= " ORDER BY nome ASC"; 
        
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function selectAll(string $orderBy = "ASC") : array | string
    {
        $sql = "SELECT d.nome, d.idtipo_doacao, d.quantidade, d.dtcadastro , t.nome as nome_tipo, l.nome as nome_local 
        FROM item_doacao d 
        INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao
        INNER JOIN local_doacao l ON d.idlocal_doacao = l.idlocal_doacao
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
        $sql = "SELECT d.nome, d.quantidade,  t.nome as nome_tipo, l.nome as nome_local, l.telefone, d.dtcadastro
        FROM item_doacao d 
        INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao 
        INNER JOIN local_doacao l ON d.idlocal_doacao = l.idlocal_doacao";
        $sql .= " WHERE d.nome LIKE :nome OR l.nome LIKE :nome";
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
            SELECT d.nome, d.quantidade, t.nome as nome_tipo, l.nome as nome_local, l.telefone, d.dtcadastro, d.idtipo_doacao, d.idlocal_doacao 
            FROM item_doacao d 
            INNER JOIN tipo_doacao t ON d.idtipo_doacao = t.idtipo_doacao 
            INNER JOIN local_doacao l ON d.idlocal_doacao = l.idlocal_doacao 
            ORDER BY d.dtcadastro DESC
            LIMIT $limite 
            OFFSET $offset";
            $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado;
    }

    public function getTotalItens()
    {
        $sql = "SELECT COUNT(*) as total FROM item_doacao";
        $this->connection->query($sql);
        $resultado = $this->connection->rs();
        return $resultado[0]['total'];
    }
}