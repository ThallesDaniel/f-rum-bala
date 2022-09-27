<?php

    require_once('../config/Conexao.php');
    require_once('../dao/PoemaDao.php');
    require_once('../model/Poema.php');

    $poema = new Poema();
    $poemadao = new PoemaDao();

    $dados = filter_input_array(INPUT_POST);

    
    if(isset($_POST['send'])) {
        $poema->setID($dados['id']);
        $poema->setTitulo($dados['titulo']);
        $poema->setCorpo($dados['corpo']);

        if($poemadao->criar($poema)) {

        echo "<script>
                alert('Poema Cadastrado com Sucesso!!');
                location.href = '../';
              </script>";
        } 
    }



?>