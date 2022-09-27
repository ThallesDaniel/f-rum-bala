<?php 

require_once('../config/Conexao.php');
require_once('../dao/LivroDao.php');
require_once('../model/livro.php');

$livro = new Livro();
$livrodao = new LivroDao();



$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $livro->setTitulo($dados['titulo']);
    $livro->setEditora($dados['editora']);
    $livro->setAutor($dados['autor']);
    $livro->setData($dados['data_pub']);
    $livro->setGenero($dados['genero']);
    $livro->setSinopse($dados['sinopse']);
    
    $livro->setImg_livro($_FILES['img_livro']);

    if($livrodao->criar($livro)) {

    echo "<script>
            alert('livro Cadastrado com Sucesso!!');
            location.href = '../';
          </script>";
    }


} else if(isset($_POST['alterar'])){

    $livro->setID_livro($dados['id_alter']);
    $livro->setTitulo($dados['titulo']);
    $livro->setEditora($dados['editora']);
    $livro->setAutor($dados['autor']);
    $livro->setData($dados['data_pub']);
    $livro->setGenero($dados['genero']);
    $livro->setSinopse($dados['sinopse']);
    $livro->setImg_livro($_FILES['img_livro']);

      $img = $_POST['del_img'];

      if($livrodao->alterar($livro)) {

        $del_img = "../img/$img";
        unlink($del_img);

          if(!is_file($del_img)){  
              echo "<script>
                      alert('livro Atualizado com Sucesso!!');
                      location.href = '../views/livro/listar_admin.php';
                  </script>";
          }
      }


} else if(isset($_POST['excluir'])) {
  
      $livro->setID_livro($_POST['id_del']);
      $img = $_POST['del_img'];

      if($livrodao->excluir($livro)) {
        
        $del_img = "../img/$img";
        unlink($del_img);
  
      echo "<script>
              alert('livro Deletado com Sucesso!!');
              location.href = '../views/livro/listar.php';
          </script>";
      }
}

?>