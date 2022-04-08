<?php

require "connect.php";

$response = array();

if(isset($_GET["gender"]) && isset($_GET["id"])){
    $gender = $_GET["gender"];
    $id = $_GET["id"];
    
        if($conn){
            $sql = "UPDATE customer SET gender = $gender WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                $status = "success";
                $result = 1;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);
            }else{
                $status = "failed";
                $result = 0;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);
            }
            // if($result && $gender == 0){
            //     $status = "success";
            //     $result = 1;
            //     $response["gender"] = 0;
            //     $response["status"] = $status;
            //     $response["result"] = $result;
            //     echo json_encode($response);
                

            // }else if($result & $gender == 1){
            //     $status = "success";
            //     $result = 1;
            //     $response["gender"] = 1;
            //     $response["status"] = $status;
            //     $response["result"] = $result;
            //     echo json_encode($response);

            // }else if($result && $gender == 2){
            //     $status = "success";
            //     $result = 1;
            //     $response["gender"] = 2;
            //     $response["status"] = $status;
            //     $response["result"] = $result;
            //     echo json_encode($response);

            // }else{
            //     $status = "failed";
            //     $result = 0;
            //     $response["status"] = $status;
            //     $response["result"] = $result;
            //     echo json_encode($response);
            
            //     //echo json_encode(array('email' => $email, 'status' => $status, 'result' => $result));
            // }
    
        }else{
            $status = "failed";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}else{
    echo "????";
}

    mysqli_close($conn);

?>