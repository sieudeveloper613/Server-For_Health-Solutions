<?php

require_once "connect.php";

$response = array();

    if(isset($_GET["idCustomer"]) && isset($_GET["nameReceiver"]) && isset($_GET["phoneReceiver"]) 
       && isset($_GET["deliveryAddress"]) && isset($_GET["idCart"]) && isset($_GET["nameProduct"])
       && isset($_GET["priceProduct"]) && isset($_GET["amountCart"]) && isset($_GET["imageProduct"])) {

        $id = $_GET["idCustomer"];
        $name = $_GET["nameReceiver"];
        $phone = $_GET["phoneReceiver"];
        $idCart = $_GET["idCart"];
        $address = $_GET["deliveryAddress"];
        $nameProduct = $_GET["nameProduct"];
        $priceProduct = $_GET["priceProduct"];
        $amountCart = $_GET["amountCart"];
        $image = $_GET["imageProduct"];

        if($conn){
            $insertCart = " INSERT INTO Bill ( idCustomer, 
                                                nameReceiver, 
                                                phoneReceiver,
                                                deliveryAddress,
                                                idCart,
                                                nameProduct, 
                                                priceProduct, 
                                                amountCart,
                                                imageProduct ) 
                            VALUES ( (SELECT idCustomer FROM Customer WHERE idCustomer = $id),
                                     (SELECT nameCustomer FROM Customer WHERE idCustomer = $id),
                                     (SELECT phoneCustomer FROM Customer WHERE idCustomer = $id),
                                     (SELECT mainAddress FROM Customer WHERE idCustomer = $id), 
                                     (SELECT idCart FROM Carts WHERE idCart = $idCart),
                                     (SELECT nameProduct FROM Carts WHERE Carts.idCart = $idCart),
                                     (SELECT priceProduct FROM Carts WHERE Carts.idCart = $idCart),
                                     (SELECT amountCart FROM Carts WHERE Carts.idCart = $idCart),
                                     (SELECT imageProduct FROM Carts WHERE Carts.idCart = $idCart) )";

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