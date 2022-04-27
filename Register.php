<?php

require "connect.php";

if(isset($_GET["nameCustomer"]) && isset($_GET["accountCustomer"]) 
        && isset($_GET["phoneCustomer"]) && isset($_GET["passwordCustomer"])){
    $name = $_GET["nameCustomer"];
    $account = $_GET["accountCustomer"];
    $phone = $_GET["phoneCustomer"];
    $password = $_GET["passwordCustomer"];
    
        if($conn){
            $sql = "SELECT * FROM customer WHERE accountCustomer = '$account' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $status = "EXIST";
                $result = 0;
                echo json_encode(array('status' => $status, 'result' => $result));
    
            }else{
                $sql = "INSERT INTO customer (nameCustomer, accountCustomer, passwordCustomer, phoneCustomer) 
                                    VALUES ('$name', '$account', '$password', '$phone')";
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