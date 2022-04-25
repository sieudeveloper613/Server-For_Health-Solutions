<?php

require "connect.php";

if($conn){
    $createTableCart = "CREATE TABLE Carts (
        idCart INT AUTO_INCREMENT,
        idCustomer INT,
        idProduct INT,
        nameProduct VARCHAR(255) NOT NULL,
        priceProduct DOUBLE NOT NULL,
        imageProduct VARCHAR(255) NOT NULL,
        PRIMARY KEY (idCart),
        FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer),
        FOREIGN KEY (idProduct) REFERENCES Product(idProduct)
    )";
    $result = mysqli_query($conn, $createTableCart);
    if($result){
        echo "Create Table Cart Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>