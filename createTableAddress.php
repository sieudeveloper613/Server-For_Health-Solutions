<?php

require "connect.php";

if($conn){
    $createTableAddress = "CREATE TABLE address (
        idAddress INT AUTO_INCREMENT,
        nameReceiver VARCHAR(255) NOT NULL,
        phoneReceiver VARCHAR(10) NOT NULL,
        contentAddress VARCHAR(255) NOT NULL,
        isDefault BOOLEAN DEFAULT 0,
        idCustomer INT,
        PRIMARY KEY (idAddress),
        FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer)
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