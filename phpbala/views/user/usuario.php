

<?php 

echo '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title></title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="">
            </head>
            <body>
                
                <h2> Página Inicial - Usuário </h2>
                <h4> Bem vindo, ' . $usuario->getNome() . '. </h4>
                <ul> 
                    <li>
                        <form action="views/alterar/index.php" method="post" name="edit">
                            <input type="hidden" id="id_edit" name="id_edit" value="' . $usuario->getID() . '"/>
                            <button type="submit" style="background-color:#FFF; text-decoration:underline; border:none; cursor:pointer;"/> Alterar Cadastro </button>
                        </form>
                    </li>
                    <li> <a href="views/livro/listarusuario.php"> Visualizar livros </li>
                    <li><a href="views/critica/listarusuario.php"> Visualizar critica </li>
                    <li> <a href="./controller/UsuarioController.php?logout=true"> Sair </a> </li>
                </ul>
            </body>
        </html>';


?>