<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["idCustomer"])){
        $id = $_GET["idCustomer"];

        if($conn){
            $sql = "SELECT * FROM Bill WHERE idCustomer = $id";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $bill = array();

                $bill['idBill'] = $row['idBill'];
                $bill['idCustomer'] = $row['idCustomer'];
                $bill['nameReceiver'] = $row['nameReceiver'];
                $bill['phoneReceiver'] = $row['phoneReceiver'];
                $bill['deliveryAddress'] = $row['deliveryAddress'];
                $bill['idCart'] = $row['idCart'];
                $bill['nameProduct'] = $row['nameProduct'];
                $bill['priceProduct'] = $row['priceProduct'];
                $bill['amountCart'] = $row['amountCart'];
                $bill['imageProduct'] = $row['imageProduct'];

                $status = "SUCCESS";
                $result = 1;
                $response["bill"] = $bill;
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