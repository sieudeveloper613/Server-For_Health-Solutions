<?php

require "connect.php";

$response = array();

if(isset($_GET["_gender"]) && isset($_GET["_id"])){
    $gender = $_GET["_gender"];
    $id = $_GET["_id"];
    
        if($conn){
            $sql = "UPDATE customer SET _gender = $gender WHERE _id = $id";
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