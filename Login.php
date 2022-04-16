<?php

require "connect.php";

$response = array();
if(isset($_GET["accountCustomer"]) && isset($_GET["passwordCustomer"])){
    $account = $_GET["accountCustomer"];
    $password = $_GET["passwordCustomer"];
    
    
        if($conn){
            $sql = "SELECT * FROM customer WHERE accountCustomer = '$account' AND passwordCustomer = '$password' ";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);

                $status = "SUCCESS";
                $result = 1;

                $customer = array();
                $customer["idCustomer"] = $row["idCustomer"];
                $customer["nameCustomer"] = $row["nameCustomer"];
                $customer["accountCustomer"] = $row["accountCustomer"];
                $customer["passwordCustomer"] = $row["passwordCustomer"];
                $customer["phoneCustomer"] = $row["phoneCustomer"];
                $customer["dobCustomer"] = $row["dobCustomer"];
                $customer["emailCustomer"] = $row["emailCustomer"];
                $customer["genderCustomer"] = $row["genderCustomer"];
                $customer["avatarCustomer"] = $row["avatarCustomer"];
                $customer["idAddress"] = $row["idAddress"];
            
                

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