<?php

require "connect.php";

$response = array();

if(isset($_GET["idFeedback"]) && isset($_GET["idCustomer"]) && isset($_GET["titleFeedback"]) && isset($_GET["nameCustomer"]) 
            && isset($_GET["titleNotification"]) && isset($_GET["contentNotification"])){
    $id = $_GET["idCustomer"];
    $name = $_GET["nameCustomer"];
    $idFeedback = $_GET["idFeedback"];
    $titleFeedback = $_GET["titleFeedback"];
    $titleNotification = $_GET["titleNotification"];
    $contentNotification = $_GET["contentNotification"];
    
        if($conn){
            $sql = "INSERT INTO Notifications ( idFeedback, 
                                                idCustomer, 
                                                nameCustomer, 
                                                titleFeedback, 
                                                titleNotification, 
                                                contentNotification ) 
                    VALUES 
                    ((SELECT idFeedback FROM Feedback WHERE idFeedback = $idFeedback),
                     (SELECT idCustomer FROM Customer WHERE idCustomer = $id),
                     (SELECT nameCustomer FROM Customer WHERE idCustomer = $id),
                     (SELECT titleFeedback FROM Feedback WHERE idFeedback = $idFeedback),
                     '$titleNotification', 
                     '$contentNotification')";
             
            $result = mysqli_query($conn, $sql);

            if($result){
                $status = "SUCCESS";
                $result = 1;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);

            }else{
                $status = "FAILED";
                $result = 0;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);
                //echo json_encode(array('email' => $email, 'status' => $status, 'result' => $result));
    
            }
    
        }else{
            $status = "FAILED";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}else{
    echo "????";
}

    mysqli_close($conn);

?>