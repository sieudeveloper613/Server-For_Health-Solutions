<?php

require "connect.php";

if($conn){
    $createTableCategory = "CREATE TABLE category (
                                        _idCategory INTEGER AUTO_INCREMENT PRIMARY KEY,
                                        _nameCategory VARCHAR(255) NOT NULL)";

    $result = mysqli_query($conn, $createTableCategory);
    if($result){
        echo "Create Table Address Successful";
    }else{
        echo " Create Table Address Failed";
    }
}

mysqli_close($conn);

?>