<?php

require "connect.php";

$response = array();

if( isset($_GET["contentAddress"]) && isset($_GET["isDefault"]) && isset($_GET["idCustomer"]) && isset($_GET["idAddress"])){
    $address = $_GET["contentAddress"];
    $isDefault = $_GET["isDefault"];
    $idAddress = $_GET["idAddress"];
    $id = $_GET["idCustomer"];
    
        if($conn){
            $sql = "UPDATE address SET contentAddress = '$address', isDefault = $isDefault 
                where idCustomer = (SELECT idCustomer FROM Customer WHERE idCustomer = $id) 
                    AND idAddress = $idAddress"; 
             
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