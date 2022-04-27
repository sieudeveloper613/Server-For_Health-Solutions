<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["idNotification"])){
        $id = $_GET["idNotification"];

        if($conn){
            $sql = "SELECT * FROM Notifications WHERE idNotification = $id";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $notification = array();

                $notification['idNotification'] = $row['idNotification'];
                $notification['idFeedback'] = $row['idFeedback'];
                $notification['idCustomer'] = $row['idCustomer'];
                $notification['nameCustomer'] = $row['nameCustomer'];
                $notification['titleFeedback'] = $row['titleFeedback'];
                $notification['titleNotification'] = $row['titleNotification'];
                $notification['contentNotification'] = $row['contentNotification'];

                $status = "SUCCESS";
                $result = 1;
                $response["notification"] = $notification;
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