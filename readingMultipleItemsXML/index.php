<?php
    // Carregar o arquivo XML e transformar em um objeto:
    $xml = simplexml_load_file('arquivo.xml');

    // Exibir as informações:
    echo "Titulo: " . $xml->title . "<br>";
    echo "Relatório: " . $xml->report . "<br><br><br>";

    // Percorre todos os registros de venda:
    foreach ($xml->sale as $registration) :
        echo "ID da venda: " . $registration->id . "<br>";
        echo "Nome: " . $registration->name . "<br>";
        echo "E-mail: " . $registration->email . "<br>";
        echo "Telefone: " . $registration->phone . "<br>";
        echo "<br>";
        foreach ($registration->products->product as $product) :
            echo "ID do produto: " . $product->id . "<br>";
            echo "Nome: " . $product->name . "<br>";
            echo "Quantidade: " . $product->amount . "<br>";
            echo "<br>";
        endforeach;

        echo "<hr>";
    endforeach;
?>