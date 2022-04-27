<?php

require "connect.php";

if($conn){
    $createTableNotification = "CREATE TABLE Notifications (
        idNotification INT AUTO_INCREMENT,
        idFeedback INT,
        idCustomer INT,
        nameCustomer VARCHAR(55) NOT NULL,
        titleFeedback VARCHAR(255) NOT NULL,
        titleNotification VARCHAR(255) NOT NULL,
        contentNotification VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (idNotification),
        FOREIGN KEY (idFeedback) REFERENCES Feedback(idFeedback),
        FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer)
    )";
    $result = mysqli_query($conn, $createTableNotification);
    if($result){
        echo "Create Table Notification Successful";
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>