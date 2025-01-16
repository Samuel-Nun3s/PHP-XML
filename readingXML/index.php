<?php 
    echo "<h1>Ler XML com PHP</h1>";

    // Carregar o arquivo XML e transformar em um objeto:
    $xml = simplexml_load_file("arquivo.xml");  

    // Apresentar as informações do XML:
    echo 'ID: ' . $xml->id . '<br>';
    echo 'Name: ' . $xml->name . '<br>';
    echo 'Email: ' . $xml->email . '<br>';
    echo 'Phone: ' . $xml->phone . '<br>';
    
    // Atribuindo o conteudo XML para variavel:
    $string = "<?xml version='1.0' encoding='UTF-8'?>
    <sale>
        <id>2</id>
        <name>Maria</name>
        <email>maria@gmail.com</email>
        <phone>(xx) x xxxx-xxxx</phone>
    </sale>";

    // Transformando o conteúdo XML da variavel string em Objeto:
    $xmls = simplexml_load_string($string);

    // Apresentar as informações do XML:
    echo 'ID: ' . $xmls->id . '<br>';
    echo 'Name: ' . $xmls->name . '<br>';
    echo 'Email: ' . $xmls->email . '<br>';
    echo 'Phone: ' . $xmls->phone . '<br>';
?>