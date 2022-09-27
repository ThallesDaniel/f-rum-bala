<?php 

// Criação da classe livro com o CRUD

class LivroDao {

    public function criar(Livro $livro) {
        try {

            $sql = "INSERT INTO livro (titulo, editora, autor, data_pub, genero, sinopse, img_livro) VALUES (:titulo, :editora, :autor, :data_pub, :genero, :sinopse, :img_livro)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":titulo", $livro->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":editora", $livro->getEditora(), PDO::PARAM_STR);
            $stmt->bindValue(":autor", $livro->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(":data_pub", $livro->getDatapub(), PDO::PARAM_STR);
            $stmt->bindValue(":genero", $livro->getGenero(), PDO::PARAM_STR);
            $stmt->bindValue(":sinopse", $livro->getSinopse(), PDO::PARAM_STR);
 
            $stmt->bindValue(":img_livro", $livro->getImg_livro(), PDO::PARAM_STR);
        

            $nomel = $livro->getTitulo();
            $imagem = $livro->getImg_livro();
            include '../includes/upload.php';
            $stmt->bindValue(":img_livro", $nome_imagem, PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir livro <br>" . $e->getMessage() . '<br>';
        }
    }

    public function alterar(Livro $livro) {
        try {
            $sql = "UPDATE livro SET titulo = :titulo, editora = :editora, autor = :autor, data_pub = :data_pub, genero = :genero, sinopse = :sinopse, img_livro = :img_livro WHERE id_livro = :id";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $livro->getID_livro(), PDO::PARAM_INT);
            $stmt->bindValue(":titulo", $livro->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":editora", $livro->getEditora(), PDO::PARAM_STR);
            $stmt->bindValue(":autor", $livro->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(":data_pub", $livro->getDatapub(), PDO::PARAM_STR);
            $stmt->bindValue(":genero", $livro->getGenero(), PDO::PARAM_STR);
            $stmt->bindValue(":sinopse", $livro->getSinopse(), PDO::PARAM_STR);


            $nomep = $livro->getTitulo();
            $imagem = $livro->getImg_livro();
            include '../includes/upload.php';
            $stmt->bindValue(":img_livro", $nome_imagem, PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar atualizar livro." . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM livro order by titulo asc";
            
         // $sql =  "SELECT usuario.nome_user, livro.titulo, critica.avaliacao, critica.comentario
         // FROM ((critica
         // INNER JOIN usuario ON usuario.id_usuario = critica.id_usuario)
          //INNER JOIN livro ON livro.id_livro = critica.id_livro);";

            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listalivros($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }

    public function editar() {
        try {
            $sql = "SELECT * FROM livro WHERE id_livro = :id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $_POST['id_edit'], PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listalivros($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
        }

    }

    private function listalivros($linhas) {

        $livro = new Livro();
        $livro->setID_livro($linhas['id_livro']);
        $livro->setTitulo($linhas['titulo']);
        $livro->setEditora($linhas['editora']);
        $livro->setAutor($linhas['autor']);
        $livro->setData($linhas['data_pub']);
        $livro->setGenero($linhas['genero']);
        $livro->setSinopse($linhas['sinopse']);
        $livro->setImg_livro($linhas['img_livro']);


        return $livro;
    }

    public function excluir(Livro $livro) {
        try {

            $sql = "DELETE FROM livro WHERE id_livro= :id";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $livro->getID_livro(), PDO::PARAM_INT);
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Excluir livro" . $e->getMessage();
        }
    }

}

?>