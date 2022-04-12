<?php

    require "connect.php";

    $response = array();

    if($conn && isset($_GET['id'])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM address where id = (select id from customer where id = $id)";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["addressList"] = array();
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $addressList = array();
                $addressList['id'] = $row['id'];
                $addressList['_idAddress'] = $row['_idAddress'];
                $addressList['_address'] = $row['_address'];
                $addressList['_isDefault'] = $row['_isDefault'];
            
            array_push($response['addressList'], $addressList);
        }
        $status = "success";
        $result = 1;
        $response["status"] = $status;
        $response["result"] = $result;
        echo json_encode($response);

    } else {
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

    //echo json_encode($response);
    mysqli_close($conn);
?>