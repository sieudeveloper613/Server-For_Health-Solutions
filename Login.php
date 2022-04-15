<?php

require "connect.php";

$response = array();
if(isset($_GET["_account"]) && isset($_GET["_password"])){
    $account = $_GET["_account"];
    $password = $_GET["_password"];
    
    
        if($conn){
            $sql = "select * from customer where _account = '$account' and _password = '$password' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);

                $status = "SUCCESS";
                $result = 1;

                $customer = array();
                $customer["_id"] = $row["_id"];
                $customer["_name"] = $row["_name"];
                $customer["_account"] = $row["_account"];
                $customer["_password"] = $row["_password"];
                $customer["_phone"] = $row["_phone"];
                $customer["_dob"] = $row["_dob"];
                $customer["_email"] = $row["_email"];
                $customer["_gender"] = $row["_gender"];
                $customer["_avatar"] = $row["_avatar"];
            
                

                $response["customer"] = $customer;
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