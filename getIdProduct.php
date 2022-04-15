<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["_idProduct"])){
        $idProduct = $_GET["_idProduct"];

        if($conn){
            $sql = "SELECT * FROM product where _idProduct = $idProduct";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
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
                
                    $status = "SUCCESS";
                    $result = 1;
                    $response["product"] = $product;
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
    }

    


   mysqli_close($conn);
?>