<?php

require "connect.php";

$response = array();

if(isset($_GET["idCustomer"])){

    $id = $_GET["idCustomer"];

    if($conn){
        $sql = "SELECT * FROM Customer WHERE idCustomer = $id";
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