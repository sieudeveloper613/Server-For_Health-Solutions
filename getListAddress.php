<?php

    require "connect.php";

    $response = array();

    if($conn && isset($_GET['idCustomer'])){
        $id = $_GET["idCustomer"];

        $sql = "SELECT * FROM address WHERE idCustomer = (SELECT idCustomer FROM Customer WHERE idCustomer = $id)";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["addressList"] = array();
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $addressList = array();
                $addressList['idCustomer'] = $row['idCustomer'];
                $addressList['idAddress'] = $row['idAddress'];
                $addressList['contentAddress'] = $row['contentAddress'];
                $addressList['isDefault'] = $row['isDefault'];
            
            array_push($response['addressList'], $addressList);
        }
        $status = "SUCCESS";
        $result = 1;
        $response["status"] = $status;
        $response["result"] = $result;
        echo json_encode($response);

    } else {
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

    //echo json_encode($response);
    mysqli_close($conn);
?>