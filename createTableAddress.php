<?php

require "connect.php";

if($conn){
    $createTableAddress = "CREATE TABLE address (
        idAddress INT AUTO_INCREMENT PRIMARY KEY,
        address VARCHAR(255),
        isDefault BOOL
    )";
    $result = mysqli_query($conn, $createTableAddress);
    if($result){
        echo "Create Table Address Successful";
    }else{
        echo " Create Table Address Failed";
    }
}

mysqli_close($conn);

?>