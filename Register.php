<?php

require "connect.php";

if(isset($_GET["_name"]) && isset($_GET["_account"]) && isset($_GET["_phone"]) && isset($_GET["_password"])){
    $name = $_GET["_name"];
    $account = $_GET["_account"];
    $phone = $_GET["_phone"];
    $password = $_GET["_password"];
    
        if($conn){
            $sql = "SELECT * FROM customer WHERE _account = '$account' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $status = "EXIST";
                $result = 0;
                echo json_encode(array('status' => $status, 'result' => $result));
    
            }else{
                $sql = "INSERT INTO customer (_name, _account, _password, _phone) 
                                    values ('$name', '$account', '$password', '$phone')";
                    if(mysqli_query($conn, $sql)){
                        $status = "SUCCESS";
                        $result = 1;
                        
                        echo json_encode(array('status' => $status, 'result' =>$result));
    
                    }else{
                        $status = "FAILED";
                        echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
                    }
            }
    
    
        }else{
            $status = "FAILED";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}



    mysqli_close($conn);
?>