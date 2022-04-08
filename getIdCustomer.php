<?php

require "connect.php";

$response = array();

if(isset($_GET["id"])){

    $id = $_GET["id"];
    // $name = $_GET["name"];
    // $account = $_GET["account"];
    // $password = $_GET["password"];
    // $phone = $_GET["phone"];
    // $email = $_GET["email"];
    // $gender = $_GET["gender"];
    // $address = $_GET["address"];
    // $avatar = $_GET["avatar"];

    if($conn){
        $sql = "SELECT * FROM customer where id = $id";
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
                $customer["address"] = $row["address"];
                $customer["avatar"] = $row["avatar"];

            $response["customer"] = $customer;
            $response["status"] = $status;
            $response["result"] = $result;

            echo json_encode($response);

        }else{
            $status = "failed";
            $result = 0;
            $response["status"] = $status;
            $response["result"] = $result;
            
            echo json_encode($response);
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