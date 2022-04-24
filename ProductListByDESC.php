<?php

    require "connect.php";

    $response = array();

    if($conn){
        $sql = "SELECT * FROM product ORDER BY idProduct DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["productList"] = array();
            // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $product = array();
            $product['idProduct'] = $row['idProduct'];
            $product['idCategory'] = $row['idCategory'];
            $product['idType'] = $row['idType'];
            $product['nameProduct'] = $row['nameProduct'];
            $product['priceProduct'] = $row['priceProduct'];
            $product['nameCategory'] = $row['nameCategory'];
            $product['nameType'] = $row['nameType'];
            $product['originProduct'] = $row['originProduct'];
            $product['branchProduct'] = $row['branchProduct'];
            $product['imageProduct'] = $row['imageProduct'];
            $product['contentProduct'] = $row['contentProduct'];
            
            //$response["product"] = $product;
            array_push($response['productList'], $product);
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