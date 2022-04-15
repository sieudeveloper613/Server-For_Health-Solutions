<?php

require "connect.php";

$response = array();

if(isset($_GET["_id"])){

    $id = $_GET["_id"];

    if($conn){
        $sql = "SELECT * FROM Customer where _id = $id";
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
                $customer["_idAddress"] = $row["_idAddress"];
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