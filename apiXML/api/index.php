<?php
    // Incluir o arquivo com a conexão com o banco de dados:
    require_once 'connection.php';

    // Criar o cabeçalho para retornar XML:
    header("Content-type: text/xml; charset=utf-8");

    // SimpleXMLElement função do PHP que retorna string XML:
    $productsXML = new SimpleXMLElement("<products></products>");

    // Buscar no banco de dados os produtos:
    $query = "SELECT id, name FROM products";

    // Preparar a Query:
    $resultProducts = $pdo->prepare($query);

    // Executar a Query com PDO:
    $resultProducts->execute();

    // Acessa o IF quando encontrou produto no banco de dados:
    if (($resultProducts) and ($resultProducts->rowCount() != 0)) {
        // Ler os registros retornados do banco de dados:
        while ($rowProduct = $resultProducts->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($rowProduct);

            extract($rowProduct);

            // Acrescentar TAG filha <produto> no XML para colocar os dados do produto:
            $productXML = $productsXML->addChild('product');

            // Acrescentar as TAGS XML com os dados do produto:
            $productXML->addChild('id', $id);
            $productXML->addChild('name', $name);
        }

        // Imprimir o XML:
        echo $productsXML->asXML();

        // Pausar o processamento:
        exit;
    } else {
        // Criar a TAG filha <erro> com a mensagem de erro:
        $productsXML->addChild('erro', "Erro: Nenhum produto encontrado!");

        // Imprimir o XML:
        echo $productsXML->asXML();

        // Pausar o processamento:
        exit;
    }

?>