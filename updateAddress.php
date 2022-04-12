<?php

require "connect.php";

$response = array();

if( isset($_GET["_address"]) && isset($_GET["_isDefault"]) && isset($_GET["id"]) && isset($_GET["_idAddress"])){
    $address = $_GET["_address"];
    $isDefault = $_GET["_isDefault"];
    $idAddress = $_GET["_idAddress"];
    $id = $_GET["id"];
    
        if($conn){
            $sql = "UPDATE address set _address = '$address', _isDefault = $isDefault 
            where id = $id and _idAddress = $idAddress"; 
             
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