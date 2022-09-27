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
                
                <h2> Página Inicial - Administrador do Site </h2>
                <h4> Bem vindo, ' . $usuario->getNome() . '. </h4>
                <ul> 
                    <li> <a href="views/cadastro"> Cadastrar Usuários </a> </li>
                    <li> <a href="views/livro"> Cadastrar livros </a> </li>
                    <li> <a href="views/listar"> Listar Usuários </li>
                    <li> <a href="views/livro/listaradmin.php"> Listar livros </li>
                    <li> <a href="./controller/UsuarioController.php?logout=true"> Sair </a> </li>
                </ul>
            </body>
        </html>';


?>