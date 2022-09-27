<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

$login = new UserDao();

if($login->checkLogin()) {
	header("Location: ../../");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> login </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    
    <h2> Acessar o Sistema </h2>

    <fieldset style="border:3px solid #098; width:400px;">
        <legend> Login </legend>
            <form action="../../controller/UsuarioController.php" method="post" name="entrar">
                <label> E-mail: </label>
                <input type="email" id="mail" name="mail" required />
                <br/> <br/>
                <label> Senha: </label>
                <input type="password" id="senha" name="senha" required />
                <br/> <br/>
                <input type="submit" id="login" name="login" value="ENTRAR" />
                <button> <a href="../cadastro/" style="text-decoration: none;"> CADASTRAR </a> </button>
        </form>
    </fieldset>

</body>
</html>