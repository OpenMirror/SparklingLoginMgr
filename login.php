<?php
    session_start();
    // The global $_POST variable allows you to access the data sent with the POST method by name
    // To access the data sent with the GET method, you can use $_GET
    $login = htmlspecialchars($_POST['login']);
    

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
    
//     echo '<pre>'; print_r($mycsvfile); echo '</pre>';
    $i = 0;
    

    for ($i = 0; $i <= 100; $i++) {
        if ($mycsvfile[$i][0] == $login) {
            $ip_to_send = $mycsvfile[$i][1];
            break;
        }
    }
        

    
    
    

//     header('Location: '.$ip_to_send);
    
//     exit;
?>
 <!DOCTYPE html>
<html>
<body style="">

<iframe width="100%" height="100%" frameborder="0" src="<?php echo $ip_to_send; ?>"></iframe>

</body>
</html> 

