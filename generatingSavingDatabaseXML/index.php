<?php 
    require_once 'connection.php';
    
    $queryProducts = "SELECT name, email FROM users";

    $stmt = $pdo->prepare($queryProducts);
    $stmt->execute();

    if (($stmt) and ($stmt->rowCount() != 0)) {
        // Criar o cabeçalho para indicar tipo XML
        header('Content-type: text/xml');

        // SimpleXMLElement função do PHP que retorna string XML:
        $usersXML = new SimpleXMLElement("<users></users>");

        // Ler os registros retornado do banco de dados:
        while ($row_user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Extrair o array de dados:
            extract($row_user); 

            // Acrescentando a tag user
            $userXML = $usersXML->addChild('user');

            // Acrescentando a tag id
            $userXML->addChild('name', $name);
            $userXML->addChild('email', $email);

            // Limpando o buffer de saida:
            ob_clean();
        }
    } else {
        echo "Erro: Nenhum usuario encontrado!";
    }
    // Imprimir o XML:
    echo $usersXML->asXML();
?>