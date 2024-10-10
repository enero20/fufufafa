<?php
    $con = mysqli_connect('localhost', 'root','', 'fufufafa_store', 3307);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>