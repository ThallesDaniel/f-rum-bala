<?php

class Livro{
    
    private $id;
    private $titulo;
    private $editora;
    private $autor;
    private $data_pub;
    private $img_livro;
    
    function getID_livro() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getEditora() {
        return $this->editora;
    }

    function getAutor() {
        return $this->autor;
    }

    function getDatapub() {
        return $this->data_pub;
    }

    function getGenero() {
        return $this->genero;
    }
    function getSinopse() {
        return $this->sinopse;
    }
    function getImg_livro() {
        return $this->img_livro;
    }

    function setID_livro($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setautor($autor) {
        $this->autor = $autor;
    }

    function setData($data_pub) {
        $this->data_pub = $data_pub;
    }
    function setGenero($genero) {
        $this->genero = $genero;
    }
    function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }

    function setImg_livro($img_livro) {
        $this->img_livro = $img_livro;
    }
    
}