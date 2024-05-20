<?php 

namespace App\Bot;


class Alert
{
    
    public static function sendMessagePet(
        string $nomeAbrigo,
        string $telefone,
        string $nome,
        string $idade, 
        string $raca,
        string $especie, 
        string $caracteristicas)
    {
        return sprintf("Olá, um novo animal foi cadastrado no abrigo %s. Nome: %s,\n idade aproximada: %s,\n raca: %s,\n especie: %s\n com as seguintes caracteristicas: %s\n. Para mais informações, ligue %s.", 
        $nomeAbrigo, $nome, $idade, $raca, $especie, $caracteristicas, $telefone);
    }

    public static function sendMessagePessoa(string $nomeAbrigo, string $nome, string $idade, string $caracteristicas, string $telefone)
    {
        return sprintf("Olá, uma nova pessoa foi cadastrada no abrigo %s.\nNome: %s, \nidade: %s,\n com as seguintes caracteristicas %s.\n Para mais informações ligue para %s.", $nomeAbrigo, $nome, $idade, $caracteristicas, $telefone);
    }

}