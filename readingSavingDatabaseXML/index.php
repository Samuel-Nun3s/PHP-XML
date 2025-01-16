<?php
    require_once 'connection/connection.php';

    $xml = simplexml_load_file('arquivo.xml');

    foreach($xml->user as $registration):
        echo "Nome: " . $registration->name . "<br>";
        echo "Email: " . $registration->email . "<br>";

        $regUser = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $pdo->prepare($regUser);
        $stmt->bindParam(':name', $registration->name);
        $stmt->bindParam(':email', $registration->email);
        $stmt->execute();

        if ($stmt->rowCount()) {
            echo "<p style='color: green;'>Usuário cadastrado com sucesso!<p>";
        } else {
            echo "<p style='color: #f00;'>ERRO: Usuário não cadastrado com sucesso!<p>";
        }

        echo "<hr>";
    endforeach;
?>