<?php

require "connect.php";

$response = array();
if(isset($_GET["account"]) && isset($_GET["password"])){
    $account = $_GET["account"];
    $password = $_GET["password"];
    
    
        if($conn){
            $sql = "select * from customer where account = '$account' and password = '$password' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $status = "success";
                $result = 1;
                $customer = array();
                $customer["id"] = $row["id"];
                $customer["name"] = $row["name"];
                $customer["account"] = $row["account"];
                $customer["password"] = $row["password"];
                $customer["phone"] = $row["phone"];
                $customer["dob"] = $row["dob"];
                $customer["email"] = $row["email"];
                $customer["gender"] = $row["gender"];
                $customer["avatar"] = $row["avatar"];
            
                // $name_user = $row['name'];
                // $email_user = $row['email'];
                // $phone_user = $row['phone'];
                // $pass_user = $row['password'];

                $response["customer"] = $customer;
                $response["status"] = $status;
                $response["result"] = $result;

                echo json_encode($response);

                // echo json_encode(array('name' => $name_user,
                //                        'email' => $email_user,
                //                        'phone' => $phone_user,
                //                        'password' => $pass_user, 
                //                        'status' => $status, 
                //                        'result' => $result));
    
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