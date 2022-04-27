<?php

require "connect.php";

if($conn){
    $createTableBill = "CREATE TABLE Bill (
        idBill INT AUTO_INCREMENT,
        idCustomer INT,
        nameReceiver VARCHAR(255) NOT NULL,
        phoneReceiver VARCHAR(255) NOT NULL,
        deliveryAddress VARCHAR(255) NOT NULL,  
        idCart INT,
        nameProduct VARCHAR(255) NOT NULL,
        priceProduct DOUBLE NOT NULL,
        amountCart INT NOT NULL,
        imageProduct VARCHAR(255) NOT NULL,
        PRIMARY KEY (idbILL),
        FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer),
        FOREIGN KEY (idCart) REFERENCES Carts(idCart)
    )";
    $result = mysqli_query($conn, $createTableBill);
    if($result){
        echo "Create Table Bill Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>