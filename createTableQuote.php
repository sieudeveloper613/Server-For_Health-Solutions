<?php

require "connect.php";

if($conn){
    $createTableQuotes = "CREATE TABLE Quotes (
        idQuote INT AUTO_INCREMENT,
        titleQuote VARCHAR(255) NOT NULL,
        contentQuote VARCHAR(255) NOT NULL,
        imageQuote VARCHAR(255) NOT NULL,
        PRIMARY KEY (idQuote)
    )";
    $result = mysqli_query($conn, $createTableQuotes);
    if($result){
        echo "Create Table Quote Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>