<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["idProduct"])){
        $idProduct = $_GET["idProduct"];

        if($conn){
            $sql = "SELECT * FROM product where idProduct = $idProduct";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                    $product = array();
                    $product['idProduct'] = $row['idProduct'];
                    $product['idCategory'] = $row['idCategory'];
                    $product['nameProduct'] = $row['nameProduct'];
                    $product['priceProduct'] = $row['priceProduct'];
                    $product['nameCategory'] = $row['nameCategory'];
                    $product['typeProduct'] = $row['typeProduct'];
                    $product['originProduct'] = $row['originProduct'];
                    $product['branchProduct'] = $row['branchProduct'];
                    $product['imageProduct'] = $row['imageProduct'];
                
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