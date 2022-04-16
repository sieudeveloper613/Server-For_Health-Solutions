<?php

require "connect.php";

if($conn){
    $createTableCategory = "CREATE TABLE category (
                                        idCategory INTEGER AUTO_INCREMENT PRIMARY KEY,
                                        nameCategory VARCHAR(255) NOT NULL)";

    $result = mysqli_query($conn, $createTableCategory);
    if($result){
        echo "Create Table Address Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>