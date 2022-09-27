<?php

class Conexao {
    // Variável que guarda a conexão PDO.
    protected static $conexao;

    // Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct() {

        # Informações sobre o banco de dados:
        $db_host = "localhost";
        $db_nome = "bala";
        $db_usuario = "root";
        $db_senha = "";
        $db_driver = "mysql";

        try  {
            // Atribui o objeto PDO à variável $conexao.
            self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            // Garante que o PDO lance exceções durante erros.
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Garante que os dados sejam armazenados com codificação UFT-8.
            self::$conexao->exec('SET NAMES utf8');

            // echo "Conectado com sucesso!!";
        }
        catch (PDOException $e)
        {
            // Mensagem de erro com Banco de dados.
            echo "Erro na conexão com Banco de Dados: " . $e->getMessage();
        }
    }

    // Método estático - acessível sem instanciação.
    public static function getConexao() {
        // Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$conexao) {
            new Conexao();
        }

        // Retorna a conexão.
        return self::$conexao;
    }

}

?>