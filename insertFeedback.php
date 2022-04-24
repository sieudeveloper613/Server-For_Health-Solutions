<?php

require_once "connect.php";

$response = array();

    if(isset($_GET["idCustomer"]) && isset($_GET["nameCustomer"]) 
                                  && isset($_GET["titleFeedback"]) && isset($_GET["contentFeedback"])){
        $id = $_GET["idCustomer"];
        $name = $_GET["nameCustomer"];
        $title = $_GET["titleFeedback"];
        $content = $_GET["contentFeedback"];

        if($conn){
            $insertFeedback = "INSERT INTO Feedback(idCustomer, nameCustomer, titleFeedback, contentFeedback) 
                               VALUES ((SELECT idCustomer FROM Customer WHERE idCustomer = $id), 
                                       (SELECT nameCustomer FROM Customer WHERE idCustomer = $id),
                                        '$title', '$content')";

            $result = mysqli_query($conn, $insertFeedback);
            if($result){
                $status = "SUCCESS";
                $result = 1;
                
                $response['status'] = $status;
                $response['result'] = $result;
                echo json_encode($response);
            }else{
                $status = "FAILED";
                $result = 0;
                $response['status'] = $status;
                $response['result'] = $result;
                echo json_encode($response);
            }
        }
    }

    
    mysqli_close($conn);


?>