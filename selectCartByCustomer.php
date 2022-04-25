<?php

    require "connect.php";

    $response = array();

    if(isset($_GET["idCustomer"])){
        $id = $_GET["idCustomer"];

        if($conn){

            $sql = "SELECT * FROM Carts WHERE idCustomer = $id";
            $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
           
                $response["cartList"] = array();
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $cart = array();
                    $cart['idCart'] = $row['idCart'];
                    $cart['idCustomer'] = $row['idCustomer'];
                    $cart['idProduct'] = $row['idProduct'];
                    $cart['nameProduct'] = $row['nameProduct'];
                    $cart['priceProduct'] = $row['priceProduct'];
                    $cart['imageProduct'] = $row['imageProduct'];
                array_push($response['cartList'], $cart);
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


        
    //echo json_encode($response);
    mysqli_close($conn);
?>