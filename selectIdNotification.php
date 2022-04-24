<?php

    require_once 'connect.php';

    $response = array();

    if(isset($_GET["idCustomer"]) && isset($_GET["idFeedback"])){

        $id = $_GET["idCustomer"];
        $idFeedback = $_GET["idFeedback"];

        if($conn){
            $sql = "SELECT * FROM Notifications WHERE 
            idCustomer = (SELECT idCustomer FROM Customer WHERE idCustomer = $id) AND 
            idFeedback = (SELECT idFeedback FROM Feedback WHERE idFeedback = $idFeedback)";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $response["notificationList"] = array();

                $row = mysqli_fetch_assoc($result);
                while($row = mysqli_fetch_assoc($result)) {

                    $notificationList = array();

                    $notificationList['idNotification'] = $row['idNotification'];
                    $notificationList['idFeedback'] = $row['idFeedback'];
                    $notificationList['idCustomer'] = $row['idCustomer'];
                    $notificationList['nameCustomer'] = $row['nameCustomer'];
                    $notificationList['titleFeedback'] = $row['titleFeedback'];
                    $notificationList['titleNotification'] = $row['titleNotification'];
                    $notificationList['contentNotification'] = $row['contentNotification'];
                    $notificationList['reg_date'] = $row['reg_date']; 

                    array_push($response['notificationList'], $notificationList);
                }
                
                    
                    $status = "SUCCESS";
                    $result = 1;
                    $response["status"] = $status;
                    $response["result"] = $result;
    
                    echo json_encode($response);
    
            } else {
                    $status = "FAILED";
                    $result = 0;
                    $response["status"] = $status;
                    $response["result"] = $result;
                    
                    echo json_encode($response);
                }
        }else{
            $status = "FAILED";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
    }

    


   mysqli_close($conn);
?>