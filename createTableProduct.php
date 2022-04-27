<?php

require "connect.php";

if($conn){
    $createTableProduct = "CREATE TABLE Product (
        idProduct INT AUTO_INCREMENT,
        idCategory INT,
        nameProduct VARCHAR(255) NOT NULL,
        priceProduct DOUBLE(10,3) NOT NULL,
        nameCategory VARCHAR(255) NOT NULL,
        typeProduct VARCHAR(255) NOT NULL,
        originProduct VARCHAR(255) NOT NULL,
        branchProduct VARCHAR(255) NOT NULL,
        imageProduct VARCHAR(255) NOT NULL,
        PRIMARY KEY (idProduct),
        FOREIGN KEY (idCategory) REFERENCES Category(idCategory)
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