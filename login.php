<?php
    // The global $_POST variable allows you to access the data sent with the POST method by name
    // To access the data sent with the GET method, you can use $_GET
    $login = htmlspecialchars($_POST['login']);
    $password  = htmlspecialchars($_POST['password']);

    $row = 1;
    $mycsvfile = array(); //define the main array.
    if (($handle = fopen("./secure/ip_table.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        $mycsvfile[] = $data; //add the row to the main array.
    }
    fclose($handle);
    }
    
    echo '<pre>'; print_r($mycsvfile); echo '</pre>';
    $i = 0;
    

    for ($i = 0; $i <= 100; $i++) {
        if ($mycsvfile[$i][0] == $login) {
            $ip_to_send = $mycsvfile[$i][1];
            break;
        }
    }
        

    $postdata = http_build_query(
        array(
            'password' => $password
        )
    );
    $opts = array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context = stream_context_create($opts);
    $result = file_get_contents($ip_to_send, false, $context);
    
    

    header('Location: '.$ip_to_send, true, 301);
?>
