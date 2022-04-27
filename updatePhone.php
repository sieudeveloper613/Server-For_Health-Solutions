<?php

require "connect.php";

$response = array();

if(isset($_GET["phoneCustomer"]) && isset($_GET["idCustomer"])){
    $phone = $_GET["phoneCustomer"];
    $id = $_GET["idCustomer"];
    
        if($conn){
            $sql = "UPDATE customer SET phoneCustomer = '$phone' where idCustomer = $id";
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