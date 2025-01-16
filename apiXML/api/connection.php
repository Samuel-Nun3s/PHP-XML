<?php
    $dbName = "PHPXML";
    $host = "localhost";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:dbname=$dbName;host=$host", $user, $password);
    } catch (PDOException $err) {
        echo "Erro: Conexão com o banco de dados não concluida! Erro: " . $err->getMessage();
    } catch (Exception $err) {
        echo "Erro Genérico: " . $err->getMessage();
    }
?>