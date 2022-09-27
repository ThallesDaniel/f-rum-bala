<?php

    class Poema {

        private $id_p;
        private $id;
        private $titulo;
        private $corpo;

        function getID_p() {
            return $this->id_p;
        }

        function getID() {
            return $this->id;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getCorpo() {
            return $this->corpo;
        }

        function setID_p($id_p) {
            $this->id_p = $id_p;
        }

        function setID($id) {
            $this->id = $id;
        }

        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        function setCorpo($corpo) {
            $this->corpo = $corpo;
        }
    }
?>