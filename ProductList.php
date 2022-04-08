<?php

    require "connect.php";

    $response = array();

    if($conn){
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["product"] = array();
            // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $product = array();
            $product['Ids'] = $row['Ids'];
            $product['categoryId'] = $row['categoryId'];
            $product['name'] = $row['name'];
            $product['price'] = $row['price'];
            $product['categoryName'] = $row['categoryName'];
            $product['typeProduct'] = $row['typeProduct'];
            $product['whereProduct'] = $row['whereProduct'];
            $product['branchProduct'] = $row['branchProduct'];
            $product['image'] = $row['image'];
            
            //$response["product"] = $product;
            array_push($response['product'], $product);
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