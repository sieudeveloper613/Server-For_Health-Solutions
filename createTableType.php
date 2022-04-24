<?php

require "connect.php";

if($conn){
    $createTableTypes = "CREATE TABLE Types(
        idType INT AUTO_INCREMENT,
        idCategory INT,
        nameType VARCHAR(55) NOT NULL,
        imageType VARCHAR(255) NOT NULL,
        PRIMARY KEY (idType),
        FOREIGN KEY (idCategory) REFERENCES Category(idCategory)
    )";
    $result = mysqli_query($conn, $createTableTypes);
    if($result){
        echo "Create Table Types Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>