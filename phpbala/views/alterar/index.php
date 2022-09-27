<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

if(!$login->checkLogin()) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Alterar Usuário </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
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

    <h2> Alterar Usuário </h2>

    <fieldset style="border:3px solid #098; width:700px;">
        <legend style="font-weight: bolder; font-size: 18px;"> Alterar dados </legend>

        <?php foreach ($userdao->editar() as $usuario) : ?>

            <form action="../../controller/UsuarioController.php"  enctype="multipart/form-data"  method="post" name="cad">
                <label> Nome: </label>
                <input type="hidden" id="id_alter" name="id_alter" value="<?= $usuario->getID() ?>" />
                <input type="text" id="nome" name="nome" value="<?= $usuario->getNome() ?>" required />
                <br/> <br/>
                <label> Nome de usuario: </label>
                <input type="text" id="nome_user" name="nome_user" value="<?= $usuario->getNome_user() ?>" required />
                <br/> <br/>  
                <label> Telefone: </label>
                <input type="tel" id="telefone" name="telefone" value="<?= $usuario->getTelefone()?>"  required />
                <br/> <br/>
                <label> nascimento: </label>
                <input type="date" id="nascimento" name="nascimento" value="<?= $usuario->getNascimento() ?>" required />
                <br/> <br/>
                <label> E-mail: </label>
                <input type="email" id="email" name="email" value="<?= $usuario->getEmail()?>"  required />
                <br/> <br/>
                <label> Nova Senha: </label>
                <input type="password" id="senha" name="senha" required />
                <br/> <br/>
                <label> Foto de perfil:</label>
                <img id="mostrar" alt=""> <br/>
                <input type="file" name="img_usuario" id="img_usuario" value="<?= $usuario->getImg_user()?>"  onchange="mostrarImg(event)">
                <br/> <br/>
                <input type="submit" id="alterar" name="alterar" value="Alterar Cadastro" />
                <button> <a href="../listar/" style="text-decoration:none;"> VOLTAR </a> </button>
        </form>
        <?php endforeach ?>
       
    </fieldset>

</body>
</html>