<?php  
  
class UserDao { 
  
 public function criar (Usuario $usuario) { 
 try { 
  
        $sql = "INSERT INTO usuario(nome, nome_user, telefone, nascimento, email, senha, img_usuario) VALUES (:nome, :nome_user, :telefone, :nascimento, :email, :senha, :img_usuario)"; 
  
 $stmt = Conexao::getConexao()->prepare($sql); 
 $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR); 
 $stmt->bindValue(":nome_user", $usuario->getNome_user(), PDO::PARAM_STR); 
 $stmt->bindValue(":telefone", $usuario->getTelefone(), PDO::PARAM_STR); 
 $stmt->bindValue(":nascimento", $usuario->getNascimento(), PDO::PARAM_STR); 
 $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR); 
 $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);  

 $nomep = $usuario->getNome();  
 $imagem = $usuario->getImg_user();
 include '../includes/upload.php';
 $stmt->bindValue(":img_usuario", $nome_imagem, PDO::PARAM_STR);
 
 return $stmt->execute(); 
  
 } catch (PDOException $e) { 

 echo "Erro ao Inserir usuario <br>" . $e->getMessage() . '<br>'; 
 } 
 } 
  
 public function listar() { 
 try { 
 $sql = "SELECT * FROM usuario order by nome asc"; 
 $stmt = Conexao::getConexao()->query($sql); 
 $lista = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 $list = array(); 
  
 foreach ($lista as $linha) { 
 $list[] = $this->listaUsuarios($linha); 
 } 
  
 return $list; 
  
 } catch (PDOException $e) { 
 echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage(); 
 } 
 } 
  
 public function editar() { 
 try { 
 $sql = "SELECT * FROM usuario WHERE id_usuario = :id"; 
 $stmt = Conexao::getConexao()->prepare($sql); 
            $stmt->bindValue(":id", $_POST['id_edit'], PDO::PARAM_INT); 
              $stmt->execute(); 
              $lista = $stmt->fetchAll(PDO::FETCH_ASSOC); 
              $list = array(); 
  
              foreach ($lista as $linha) { 
                  $list[] = $this->listaUsuarios($linha); 
              } 
  
              return $list; 
  
        } catch (PDOException $e) { 
              echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage(); 
        } 
  
    } 
  
    public function user() { 
        try { 
              $sql = "SELECT * FROM usuario WHERE id_usuario = :id"; 
              $stmt = Conexao::getConexao()->prepare($sql); 
              $stmt->bindValue(":id", $_SESSION['user_session'] , PDO::PARAM_INT); 
              $stmt->execute(); 
              $lista = $stmt->fetchAll(PDO::FETCH_ASSOC); 
              $list = array(); 
  
              foreach ($lista as $linha) { 
                  $list[] = $this->listaUsuarios($linha); 
              } 
  
              return $list; 
  
        } catch (PDOException $e) { 
              echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage(); 
        } 
  
    } 
      
    private function listaUsuarios($linhas) { 
  
        $usuario = new Usuario(); 
        $usuario->setID($linhas['id_usuario']); 
        $usuario->setNome($linhas['nome']); 
        $usuario->setNome_user($linhas['nome_user']);
        $usuario->setTelefone($linhas['telefone']); 
        $usuario ->setNasc($linhas['nascimento']);
        $usuario->setEmail($linhas['email']);
        $usuario->setImg($linhas['img_usuario']); 
        $usuario->setSenha(password_hash($linhas['senha'], PASSWORD_DEFAULT));  
  
        return $usuario; 
    } 
 
    public function alterar(Usuario $usuario) {
      try {
            $sql = "UPDATE usuario SET nome = :nome, nome_user = :nome_user, telefone = :telefone, nascimento = :nascimento, email = :email, senha = :senha, img_usuario = :img_usuario WHERE id_usuario = :id"; 

          $stmt = Conexao::getConexao()->prepare($sql);
          
          $stmt->bindValue(":id", $usuario->getID(), PDO::PARAM_INT); 
          $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR); 
          $stmt->bindValue(":nome_user", $usuario->getNome_user(), PDO::PARAM_STR); 
          $stmt->bindValue(":telefone", $usuario->getTelefone(), PDO::PARAM_STR); 
          $stmt->bindValue(":nascimento", $usuario->getNascimento(), PDO::PARAM_STR); 
          $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR); 
          $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);  
          $nomep = $usuario->getNome();  
          $imagem = $usuario->getImg_user();
          include '../includes/upload.php';
          $stmt->bindValue(":img_usuario", $nome_imagem, PDO::PARAM_STR);
          
          
               
          return $stmt->execute();

      } catch (PDOException $e) {
          echo "Ocorreu um erro ao tentar atualizar Usuário." . $e->getMessage();
      }
  }
  
    public function excluir(Usuario $usuario) { 
        try { 
  
              $sql = "DELETE FROM usuario WHERE id_usuario = :id"; 
              $stmt = Conexao::getConexao()->prepare($sql); 
              $stmt->bindValue(":id", $usuario->getID(), PDO::PARAM_INT); 
              return $stmt->execute(); 
  
        } catch (PDOException $e) { 
              echo "Erro ao Excluir usuario" . $e->getMessage(); 
        } 
    } 
  
    public function login(Usuario $usuario) { 
                  try { 
                        $sql = "SELECT * FROM usuario WHERE email = :email"; 
                        $stmt = Conexao::getConexao()->prepare($sql); 
              $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR); 
              $stmt->execute(); 
                        $user_linha = $stmt->fetch(PDO::FETCH_ASSOC); 

                        if($stmt->rowCount() == 1) { 
  
                              if(password_verify($usuario->getSenha(), $user_linha['senha'])) { 
  
                                      $_SESSION['user_session'] = $user_linha['id_usuario']; 
                    session_start(); 
                                      return true; 
                    
                              } else { 
                                      return false; 
                              } 
                        } 
                  } 
                  catch(PDOException $e) { 
  
                        echo "Erro ao tentar realizar o login do usuario" . $e->getMessage(); 
                  } 
        } 
  
    public function checkLogin() { 
                  if(isset($_SESSION['user_session'])) { 
                        return true; 
                  }else { 
              return false; 
        } 
        } 
  
    public function logout() { 
        session_start(); 
                  session_destroy(); 
                  unset($_SESSION['user_session']); 
                  return true; 
        } 
  
} 
  
?>