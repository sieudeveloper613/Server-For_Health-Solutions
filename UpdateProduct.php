<?php

    require_once 'connect.php';

    $db = new DBConnect();

    $response = array();

    if(isset($_GET["idProduct"]) isset($_GET['idCategory']) && isset($_GET["nameProduct"]) && isset($_GET["priceProduct"])
        && isset($_GET["nameCategory"]) 
        && isset($_GET["typeProduct"]) && isset($_GET["originProduct"])
        && isset($_GET["branchProduct"])&& isset($_GET["imageProduct"]))
    {   
        $idProduct = $_GET["idProduct"];
        $idCategory = $_GET["idCategory"];
        $nameProduct = $_GET["nameProduct"];
        $priceProduct = $_GET["priceProduct"];
        $nameCategory = $_GET["nameCategory"];
        $typeProduct = $_GET["typeProduct"];
        $originProduct = $_GET["originProduct"];
        $branchProduct = $_GET["branchProduct"];
        $imageProduct = $_GET["imageProduct"];

        $sql = " UPDATE product SET categoryId = (SELECT idCategory FROM Category WHERE idCategory = $idCategory), 
        nameProduct = '$nameProduct', priceProduct = $priceProduct, 
        nameCategory = (SELECT nameCategory FROM Category WHERE idCategory = $idCategory), typeProduct = '$typeProduct',
        originProduct = '$originProduct', branchProduct = '$branchProduct', imageProduct = '$imageProduct'
                            WHERE idProduct = '$idProduct' ";


        $result = mysqli_query($conn, $sql);

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
    }else{
        $response['result'] = "FAILED";
        $response['message'] = " Thiếu dữ liệu";
    }

    
    mysqli_close($conn);
?>