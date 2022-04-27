<?php

require "connect.php";

if($conn){
    $createTableCustomer = "CREATE TABLE Customer (
        idCustomer INT AUTO_INCREMENT,
        nameCustomer VARCHAR(255) NOT NULL,
        accountCustomer VARCHAR(255) NOT NULL,
        passwordCustomer VARCHAR(255) NOT NULL,
        phoneCustomer VARCHAR(10) NOT NULL,
        dobCustomer VARCHAR(55) NOT NULL,
        emailCustomer VARCHAR(255) NOT NULL,
        genderCustomer TINYINT(10) NOT NULL,
        avatarCustomer VARCHAR(255) NOT NULL,
        idAddress INT,
        PRIMARY KEY (idCustomer)
    )";
    $result = mysqli_query($conn, $createTableCustomer);
    if($result){
        echo "Create Table Address Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>