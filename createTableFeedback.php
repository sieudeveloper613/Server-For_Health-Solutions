<?php

require "connect.php";

if($conn){
    $createTableFeedback = "CREATE TABLE Feedback (
        idFeedback INT AUTO_INCREMENT,
        idCustomer INT,
        nameCustomer VARCHAR(55) NOT NULL,
        titleFeedback VARCHAR(255) NOT NULL,
        contentFeedback VARCHAR(255) NOT NULL,
        PRIMARY KEY (idFeedback),
        FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer)
    )";
    $result = mysqli_query($conn, $createTableFeedback);
    if($result){
        echo "Create Table Feedback Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>