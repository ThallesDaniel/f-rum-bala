<?php

    class Poemadao {

        public function criar(Poema $poema) {
            try {

                $sql = "INSERT INTO poema (id_usuario, corpo, titulo) VALUES
                (:id, :corpo, :titulo)";

                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $poema->getID(), PDO::PARAM_STR);
                $stmt->bindValue(":corpo", $poema->getCorpo(), PDO::PARAM_STR);
                $stmt->bindValue(":titulo", $poema->getTitulo(), PDO::PARAM_STR);
                return $stmt->execute();

            } catch (PDOException $e) {
                echo "Falha na inserção de Poemas <br/> " . $e->getMessage() . '<br/>';
            }
        }

        public function listar() {
            try {
                
                $sql = "SELECT * FROM poema order by id_usuario asc";
                $stmt = Conexao::getConexao()->query($sql);
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();

                foreach ($lista as $linha) {
                    $list[] = $this->listaUsuarios($linha);
                }

                return $list;

            } catch (PDOException $e) {
                echo "Falha na tentativa de Busca dos dados. " .$e->getMessage();
            }
        }

        private function listaUsuarios($linhas) {

            $poema = new Poema();
            $poema->setID($linhas['id_usuario']);
            $poema->setTitulo($linhas['titulo']);
            $poema->setCorpo($linhas['corpo']);
            
            return $poema;
        }
        
    }

?>