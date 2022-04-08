<?php

require "connect.php";

if(isset($_GET["name"]) && isset($_GET["account"]) && isset($_GET["phone"]) && isset($_GET["password"])){
    $name = $_GET["name"];
    $account = $_GET["account"];
    $phone = $_GET["phone"];
    $password = $_GET["password"];
    
        if($conn){
            $sql = "select * from customer where account = '$account' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $status = "exist";
                $result = 0;
                echo json_encode(array('status' => $status, 'result' => $result));
    
            }else{
                $sql = "insert into customer (name, account, password, phone) 
                                    values ('$name', '$account', '$password', '$phone')";
                    if(mysqli_query($conn, $sql)){
                        $status = "success";
                        $result = 1;
                        
                        echo json_encode(array('status' => $status, 'result' =>$result));
    
                    }else{
                        $status = "failed";
                        echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
                    }
            }
    
    
        }else{
            $status = "failed";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}



    mysqli_close($conn);
?>