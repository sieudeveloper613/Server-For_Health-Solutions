<?php

require "connect.php";

$response = array();

if(isset($_GET["dobCustomer"]) && isset($_GET["idCustomer"])){
    $dob = $_GET["dobCustomer"];
    $id = $_GET["idCustomer"];
    
        if($conn){
            $sql = "UPDATE customer SET dobCustomer = '$dob' where idCustomer = $id";
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