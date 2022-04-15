<?php

require "connect.php";

if($conn){
    $createTableProduct = "CREATE TABLE Product (
        _idProduct INT AUTO_INCREMENT,
        _idCategory INT,
        _nameProduct VARCHAR(255) NOT NULL,
        _priceProduct DOUBLE(10,3) NOT NULL,
        _nameCategory VARCHAR(255) NOT NULL,
        _typeProduct VARCHAR(255) NOT NULL,
        _originProduct VARCHAR(255) NOT NULL,
        _branchProduct VARCHAR(255) NOT NULL,
        _imageProduct VARCHAR(255) NOT NULL,
        PRIMARY KEY (_idProduct),
        FOREIGN KEY (_idCategory) REFERENCES Category(_idCategory)
    )";
    $result = mysqli_query($conn, $createTableProduct);
    if($result){
        echo "Create Table Product Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>