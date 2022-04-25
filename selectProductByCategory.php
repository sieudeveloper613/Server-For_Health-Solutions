<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["idCategory"])){
        $id = $_GET["idCategory"];

        if($conn){
            $sql = "SELECT * FROM product where idCategory = (SELECT idCategory FROM Category WHERE idCategory = $id)
            ORDER BY idProduct DESC";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {

                $response["productList"] = array();

                $row = mysqli_fetch_assoc($result);
                while($row = mysqli_fetch_assoc($result)) {
                    $product = array();
                    $product['idCategory'] = $row['idCategory'];
                    $product['idProduct'] = $row['idProduct'];
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
    }

    


   mysqli_close($conn);
?>