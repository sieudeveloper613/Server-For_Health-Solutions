<?php

require "connect.php";

$response = array();

if( isset($_GET["address"]) && isset($_GET["isDefault"]) && isset($_GET["id"])){
    $address = $_GET["address"];
    $isDefault = $_GET["isDefault"];
    $id = $_GET["id"];
    
        if($conn){
            $sql = "INSERT INTO address (id, address, isDefault) 
                VALUE ((select id from customer where id = $id),'$address', $isDefault)";
             
            $result = mysqli_query($conn, $sql);

            if($result){
                $status = "success";
                $result = 1;
                $response["idCustomer"] = $id;
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