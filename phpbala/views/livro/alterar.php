<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/LivroDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/livro.php');

//instancia as classes
$livro = new Livro();
$livrodao = new LivroDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin()|| $id != 1) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Alterar Livro </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script type="text/javascript">
   	
        var mostrarImg = function(event) {
            var ler = new FileReader();
            ler.onload = function(){
                var mostrar = document.getElementById('mostrar');
                mostrar.src = ler.result;
            }
        ler.readAsDataURL(event.target.files[0]);
        }
        
    </script>
 
    <style type="text/css">
        
         #mostrar {
             width: 140px;
             height: 120px;
             margin: 10px;
             border: 1px dashed #CCC;
         }
 
    </style>
</head>
<body>
    
    <h2> Alterar Livro </h2>

    <fieldset style="border:3px solid #098; width:600px;">
        <legend style="font-weight: bolder; font-size: 18px;"> Informe os dados do Livro </legend>

        <?php foreach ($livrodao->editar() as $livro) : ?>

            <form action="../../controller/LivroController.php" method="post" enctype="multipart/form-data" name="alter_pro">
                <label> Titulo: </label>
                <input type="hidden" id="id_alter" name="id_alter" value="<?= $livro->getID_livro() ?>" />
                <input type="text" id="titulo" name="titulo" value="<?= $livro->getTitulo() ?>" required />
                <br/> <br/>
                <label> Editora: </label>
                <input type="text" id="editora" name="editora" value="<?= $livro->getEditora() ?>" required />
                <br/> <br/>
                <label> Autor: </label>
                <input type="text" id="autor" name="autor" value="<?= $livro->getAutor() ?>" required />
                <br/> <br/>
                <label> Data de publicação: </label>
                <input type="date" id="data_pub" name="data_pub" value="<?= $livro->getDatapub() ?>" required />
                <br/> <br/> 
                <label> genero: </label>
                <input type="text" id="genero" name="genero" value="<?= $livro->getGenero() ?>" required />
                <br/> <br/>
                <label> Sinopse : </label>
                <input type="text" id="sinopse" name="sinopse" value="<?= $livro->getSinopse() ?>" required />
                <br/> <br/>
                <label> Imagem: </label> <br/>
                <img id="mostrar" alt=""> <br/>
                <input type="hidden" id="del_img" name="del_img" value="<?= $livro->getImg_livro() ?>"/>
                <input type="file" name="img_livro" id="img_livro" required onchange="mostrarImg(event)">
                <br/> <br/>
                <input type="submit" id="alterar" name="alterar" value="ALTERAR" />
                <button> <a href="../livro/listar_admin.php" style="text-decoration:none;"> VOLTAR </a> </button>
            </form>
        <?php endforeach ?>
    </fieldset>

</body>
</html>