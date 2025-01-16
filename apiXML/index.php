<?php 
    // URL da API:
    $url = "http://localhost/PHPXML/apiXML/api/";

    // A função curl_init() inicializa uma nova sessão:
    $ch = curl_init();

    // Utilizando CURLOPT_RETURNTRANSFER para esperar a resposta da URL:
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $url);

    // Enviar a requisição:
    curl_setopt($ch, CURLOPT_URL, $url);

    // Executar solicitação do cURL:
    $data = curl_exec($ch);

    // Fecha uma sessão cURL e libera todos os recursos:
    curl_close($ch);

    // Transformar o conteúdo XML em Objeto:
    $xml = simplexml_load_string($data);

    if (isset($xml->product)) {
        // Percorre todos os registros de vendas:
        foreach ($xml->product as $product):
            // Imprimir as informações do XML:
            echo "ID do produto: " . $product->id . "<br>";
            echo "Nome do produto: " . $product->name . "<br>";

            echo "<hr>";
        endforeach;
    } else {
        echo $xml->erro;
    }
?>