<?php

    require "connect.php";

    $response = array();

    if($conn){
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["productList"] = array();
            // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $product = array();
            $product['_idProduct'] = $row['_idProduct'];
            $product['_idCategory'] = $row['_idCategory'];
            $product['_nameProduct'] = $row['_nameProduct'];
            $product['_priceProduct'] = $row['_priceProduct'];
            $product['_nameCategory'] = $row['_nameCategory'];
            $product['_typeProduct'] = $row['_typeProduct'];
            $product['_originProduct'] = $row['_originProduct'];
            $product['_branchProduct'] = $row['_branchProduct'];
            $product['_imageProduct'] = $row['_imageProduct'];
            
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