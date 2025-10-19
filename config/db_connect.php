<?php 

    // connect to db
    $connect = mysqli_connect('localhost', 'Tonny', 'apexpizza', 'apex_pizza');

    if(!$connect) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    
?>
