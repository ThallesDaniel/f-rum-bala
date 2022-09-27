<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');


$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin() || $id != 1) {
    header("Location: ../login");
}

?>

<style>

#lista {
    
    margin: 0 100px 20px 5px;

}

#pesquisa[type=text]:focus {

    background-color: #FAFAFA;
}

#pesquisa {
    border: 1px solid #000;
    border-radius: 0;
    width: 200px;
    height: 30px;
}

#pesq {
    display: none;
    width: 200px;
    border: 1px solid #000;
    border-radius: 0;
    position: absolute  ;
}

.banda{
    border-bottom: 1px solid #000;
    margin: 2px 30px 2px 0;
    list-style-type: none;
    display: list-item;
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

    function buscador() {
    var info = document.getElementById("pesquisa").value;
    info = info.toLowerCase();
    var dados = document.getElementsByClassName("banda");
// Esconde os itens que não estão presentes e exibe apenas os que estão na barra de pesquisa.
        for(let i = 0; i < dados.length; i ++){
        if(!dados[i].innerHTML.toLowerCase().includes(info)) {
                dados[i].style.display="none";
            } else {
            dados[i].style.display="list-item";
            }
        }
    }

    function buscafout() {
        var lista = document.getElementById("pesq");
        lista.style.display="none";
    }

    function buscafin() {
        var lista = document.getElementById("pesq");
        lista.style.display="list-item";
    }


</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Listar Usuários </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h2> Listar Usuários - <a href="../../"> voltar </a> </h2>

        <section id="busca">
            <input type="text" id="pesquisa" name="pesquisa" onkeyup="buscador()"
            onfocusout="buscafout()" onfocusin="buscafin()" />  
            <div id = "pesq">
                <?php foreach ($userdao->listar() as $usuario) : ?>
                <ul id="lista">
                    <li class="banda"><?= $usuario->getNome() ?></li>
                </ul>
                <?php endforeach ?>
                <button onclick=""> CLIQUE </button>
            </div>
        </section>
        

        <table border="1" style="border:4px solid #09A; width:800px;">
            <tr style="background-color:#391;">
                <th>ID</th>
                <th>Nome</th>
                <th>Nome de usuario</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>E-mail</th>
                <th>Imagem de perfil</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($userdao->listar() as $usuario) : ?>
            <tr>
                <td class="banda"><?= $usuario->getID() ?></td>
                <td><?= $usuario->getNome() ?></td>
                <td><?= $usuario->getNome_user() ?></td>
                <td><?= $usuario->getTelefone() ?></td>
                <td><?= $usuario->getNascimento()?></td>
                <td><?= $usuario->getEmail() ?></td>
                <td><?= $usuario->getImg_user() ?></td>
                
                <td> <img src="../../img/<?= $usuario->getImg_user()?>" alt="<?= $usuario->getImg_user()?>"/></td>
                <td style="text-align:center;">
                <td style="text-align:center;">
                    <form action="../../controller/UsuarioController.php" method="post" name="del">
                        <input type="hidden" id="id_del" name="id_del" value="<?= $usuario->getID() ?>"/>
                        <input type="submit" id="excluir" name="excluir" value="EXCLUIR" style="margin-bottom:-15px; background-color:#E23;" onclick="return deletar()"/>
                    </form>
                </td>
                <td style="text-align:center;"> 
                    <form action="../alterar/" method="post" name="edit">
                        <input type="hidden" id="id_edit" name="id_edit" value="<?= $usuario->getID() ?>"/>
                        <input type="submit" id="editar" name="editar" value="EDITAR" style="margin-bottom:-15px; background-color:#2E3;"/>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>