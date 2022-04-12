<?php

require "connect.php";~

$response = array();

if( isset($_GET["_address"]) && isset($_GET["_isDefault"]) && isset($_GET["id"])){
    $address = $_GET["_address"];
    $isDefault = $_GET["_isDefault"];
    $id = $_GET["id"];
    
        if($conn){
            $sql = "INSERT INTO address (id, _address, _isDefault) 
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