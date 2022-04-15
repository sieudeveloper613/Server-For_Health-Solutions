<?php

require "connect.php";

if($conn){
    $createTableAddress = "CREATE TABLE address (
        _idAddress INT AUTO_INCREMENT,
        _contentAddress VARCHAR(255) NOT NULL,
        _isDefault BOOLEAN DEFAULT 0,
        _id INT,
        PRIMARY KEY (_idAddress),
        FOREIGN KEY (_id) REFERENCES Customer(_id)
    )";
    $result = mysqli_query($conn, $createTableAddress);
    if($result){
        echo "Create Table Address Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>