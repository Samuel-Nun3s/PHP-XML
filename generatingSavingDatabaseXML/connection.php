<?php
    $dbName = "PHPXML";
    $host = "localhost";
    $user = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:dbname=$dbName;host=$host", $user, $password);
    } catch (PDOException $e) {
        echo "Erro com o banco de dados: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erro genérico: " . $e->getMessage();
    }

?>