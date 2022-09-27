<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/LivroDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Livro.php');

//instancia as classes
$livro = new Livro();
$livrodao = new LivroDao();

$login = new UserDao();

if(!$login->checkLogin()) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Listar Usuários </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style> 
            img {
                width: 100px;
                height: 80px;
            }
        </style>
        <script>

            function deletar() {
                ok = confirm("Tem certeza que deseja deletar estes dados??");
                if(ok){
                    return true;
                } else {
                    return false;
                }
            }

        </script>
    </head>
    <body>
        <h2> Visualizar Avaliações - <a href="../../"> voltar </a> </h2>

        <table border="1" style="border:4px solid #09A; width:800px;">
            <tr style="background-color:#7FF;">
            <th>ID</th>
                <th>titulo</th>
                <th>editora</th>
                <th>autor</th>
                <th>data_pub</th>
                <th>genero</th>
                <th>sinopse</th>
                <th>Imagem</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($livrodao->listar() as $livro) : ?>
            <tr>
                <td><?= $livro->getID_livro() ?></td>
                <td><?= $livro->getTitulo() ?></td>
                <td><?= $livro->getEditora() ?></td>
                <td><?= $livro->getAutor() ?></td>
                <td><?= $livro->getDatapub() ?></td>
                <td><?= $livro->getGenero() ?></td>
                <td><?= $livro->getSinopse() ?></td>
                <td><?= $livro->getImg_livro() ?></td>
                

                <td> <img src="../../img/<?= $produto->getImg()?>" alt="<?= $produto->getImg()?>"/></td>
            </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>
