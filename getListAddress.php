<?php

    require "connect.php";

    $response = array();

    if($conn && isset($_GET['_id'])){
        $id = $_GET["_id"];
        $sql = "SELECT * FROM address WHERE _id = (SELECT _id FROM Customer WHERE _id = $id)";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["addressList"] = array();
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $addressList = array();
                $addressList['_id'] = $row['_id'];
                $addressList['_idAddress'] = $row['_idAddress'];
                $addressList['_contentAddress'] = $row['_contentAddress'];
                $addressList['_isDefault'] = $row['_isDefault'];
            
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