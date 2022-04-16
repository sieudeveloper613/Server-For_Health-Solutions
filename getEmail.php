<?php

require "connect.php";

$response = array();

if(isset($_GET["emailCustomer"])){

    $email = $_GET["emailCustomer"];

    if($conn){
        $sql = "SELECT idCustomer, emailCustomer FROM Customer WHERE emailCustomer = '$email' ";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $status = "SUCCESS";
            $result = 1;

            $customer = array();
            $customer["idCustomer"] = $row["idCustomer"];
            $customer["emailCustomer"] = $row["emailCustomer"];

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