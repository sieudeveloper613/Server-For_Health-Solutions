<?php

require "connect.php";

$response = array();

if(isset($_GET["_phone"]) && isset($_GET["_id"])){
    $phone = $_GET["_phone"];
    $id = $_GET["_id"];
    
        if($conn){
            $sql = "UPDATE customer SET _phone = '$phone' where _id = $id";
            $result = mysqli_query($conn, $sql);

            if($result && strlen($phone) == 10){
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