<?php

    require "connect.php";

    $response = array();

    if($conn){

        $sql = "SELECT * FROM Feedback";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["feedbackList"] = array();
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $feedbackList = array();
                $feedbackList['idFeedback'] = $row['idFeedback'];
                $feedbackList['idCustomer'] = $row['idCustomer'];
                $feedbackList['nameCustomer'] = $row['nameCustomer'];
                $feedbackList['titleFeedback'] = $row['titleFeedback'];
                $feedbackList['contentFeedback'] = $row['contentFeedback'];
            
            array_push($response['feedbackList'], $feedbackList);
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

    //echo json_encode($response);
    mysqli_close($conn);
?>