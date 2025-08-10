<?php
    define('DB_SERVER', 'serverxyz');
    define('DB_USERNAME', 'sbn');
    define('DB_PASSWORD', 'passwordxyz');
    define('DB_NAME', 'xyzabc');
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    
?>