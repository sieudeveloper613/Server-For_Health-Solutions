<?php

require "connect.php";

$response = array();

if(isset($_GET["password"]) && isset($_GET["id"])){
    $password = $_GET["password"];
    $id = $_GET["id"];
    
        if($conn){
            $sql = "UPDATE customer SET password = '$password' where id = $id";
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
                //echo json_encode(array('email' => $email, 'status' => $status, 'result' => $result));
    
            }
    
        }else{
            $status = "failed";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}else{
    echo "????";
}

    mysqli_close($conn);

?>