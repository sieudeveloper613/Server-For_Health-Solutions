<?php

require_once "connect.php";

$response = array();

    if(isset($_GET["idCustomer"]) && isset($_GET["idProduct"]) && isset($_GET["nameProduct"])
       && isset($_GET["priceProduct"]) && isset($_GET["amountCart"]) && isset($_GET["imageProduct"])) {

        $id = $_GET["idCustomer"];
        $idProduct = $_GET["idProduct"];
        $name = $_GET["nameProduct"];
        $price = $_GET["priceProduct"];
        $amount = $_GET["amountCart"];
        $image = $_GET["imageProduct"];

        if($conn){
            $insertCart = " INSERT INTO Carts ( idCustomer, 
                                                idProduct, 
                                                nameProduct, 
                                                priceProduct, 
                                                amountCart,
                                                imageProduct ) 
                            VALUES ( (SELECT idCustomer FROM Customer WHERE idCustomer = $id), 
                                     (SELECT idProduct FROM Product WHERE idProduct = $idProduct),
                                     (SELECT nameProduct FROM Product WHERE idProduct = $idProduct),
                                     (SELECT priceProduct FROM Product WHERE idProduct = $idProduct),
                                     $amount,
                                     (SELECT imageProduct FROM Product WHERE idProduct = $idProduct) )";

            $result = mysqli_query($conn, $insertCart);
            if($result){
                $status = "SUCCESS";
                $result = 1;
                
                $response['status'] = $status;
                $response['result'] = $result;
                echo json_encode($response);
            }else{
                $status = "FAILED";
                $result = 0;
                $response['status'] = $status;
                $response['result'] = $result;
                echo json_encode($response);
            }
        }
    }

    
    mysqli_close($conn);


?>