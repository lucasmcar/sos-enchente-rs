<?php

namespace App\Dao;

use App\Connection\Connection;
use App\Model\Usuario;

class UsuarioDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function insert(Usuario $model)
    {
        $sql = "INSERT INTO usuario (nome, email, senha, idtipo_usuario) VALUES (:nome, :email, :senha, :idtipo_usuario)";
        $this->connection->prepare($sql);
        $this->connection->bind(':nome', $model->getNome());
        $this->connection->bind(':email', $model->getEmail());
        $this->connection->bind(':senha', $model->getSenha());
        $this->connection->execute();
    }

    public function autenticacao(Usuario $model)
    {
        $sql = "SELECT nome, usuario, email FROM usuario WHERE (usuario = :usuario OR email = :email) AND senha = :senha";
        $this->connection->prepare($sql);
        if($model->getUsuario() != ""){
            $this->connection->bind(':usuario', $model);
        }
        if($model->getEmail() != ""){
            $this->connection->bind(':email', $model->getEmail());
        }
        $this->connection->bind(":senha", $model->getSenha());
        return $this->connection->one();
        
    }
}