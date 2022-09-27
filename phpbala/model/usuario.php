<?php

class Usuario{
    
    private $id;
    private $nome;
    private $nome_user;
    private $telefone;
    private $nascimento;
    private $email;
    private $senha;
    private $img_usuario;
    
    function getID() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getNome_user() {
        return $this->nome_user;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getSenha() {
        return $this->senha;
    }
    
    function getImg_user() {
        return $this->img_usuario;
    }
    function setID($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNome_user($nome_user) {
        $this->nome_user = $nome_user;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNasc($nascimento) {
        $this->nascimento = $nascimento;
    }

    function setSenha($senha) {
        $this->senha = $senha;
        
    }
    function setImg($img_usuario) {
        $this->img_usuario = $img_usuario;
    }

    
}