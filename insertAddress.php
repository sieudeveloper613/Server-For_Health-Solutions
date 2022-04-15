<?php

require "connect.php";

$response = array();

if( isset($_GET["_contentAddress"]) && isset($_GET["_isDefault"]) && isset($_GET["_id"])){
    $contentAddress = $_GET["_contentAddress"];
    $isDefault = $_GET["_isDefault"];
    $id = $_GET["_id"];
    
        if($conn){
            $sql = "INSERT INTO address (_id, _contentAddress, _isDefault) 
                VALUES ((SELECT _id FROM Customer WHERE _id = $id),'$contentAddress', $isDefault)";
             
            $result = mysqli_query($conn, $sql);

            if($result){
                $status = "SUCCESS";
                $result = 1;
                $response["idCustomer"] = $id;
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