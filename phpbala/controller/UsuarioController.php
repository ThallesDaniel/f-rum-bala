<?php  
 
require_once('../config/Conexao.php'); 
require_once('../dao/UserDao.php'); 
require_once('../model/Usuario.php'); 
 
$usuario = new Usuario(); 
$userdao = new UserDao(); 
 
 
 
$dados = filter_input_array(INPUT_POST); 
 

if(isset($_POST['cadastro'])){ 
 
$usuario->setNome($dados['nome']); 
$usuario->setNome_user($dados['nome_user']);
$usuario->setTelefone($dados['telefone']); 
$usuario ->setNasc($dados['nascimento']);
$usuario->setEmail($dados['email']);
$usuario->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT));  
$usuario->setImg($_FILES['img_usuario']); 

 
if($userdao->criar($usuario)) { 
  echo "<script> 
 alert('Usuário Cadastrado com Sucesso'); 
 location.href = '../'; 
 </script>"; 
 } 
 

} else if(isset($_POST['alterar'])){ 
 
$usuario->setID($dados['id_alter']); 
$usuario->setNome($dados['nome']); 
$usuario->setNome_user($dados['nome_user']);
$usuario->setTelefone($dados['telefone']); 
$usuario ->setNasc($dados['nascimento']);
$usuario->setEmail($dados['email']);
$usuario->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT));  
$usuario->setImg($_FILES['img_usuario']); 



 if($userdao->alterar($usuario)) { 
 
echo "<script> 
 alert('Usuário Atualizado com Sucesso manin'); 
location.href = '../views/listar/'; 
</script>"; 
 } 
 

} else if(isset($_POST['excluir'])) { 
 
$usuario->setID($_POST['id_del']); 
 
if($userdao->excluir($usuario)) { 
 
echo "<script> 
alert('Usuário Deletado com Sucesso fora lixo'); 
location.href = '../views/listar/'; 
</script>"; 
} 
 
}else if(isset($_POST['login'])) {

	$usuario->setEmail(strip_tags($dados['mail']));
	$usuario->setSenha(strip_tags($dados['senha'])); 

    $userdao->login($usuario);

	if($userdao->login($usuario)) {

     echo "<script>
            alert('Usuário logado com Sucesso!!');
            location.href = '../';
           </script>";

	} else {
        echo "<script>
                alert('Acesso inválido! login ou senha incorretos!');
                location.href = '../views/login/';
            </script>";
	}	
} else if(isset($_GET['logout'])) { 
 
$userdao->logout(); 
 
header("Location: ../views/login/"); 

} else { 

header("Location: ../"); 
} 
 
?>