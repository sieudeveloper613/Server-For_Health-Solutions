<?php

    require_once 'connect.php';

    $db = new DBConnect();

    $response = array();

    if(isset($_GET["_idProduct"]) isset($_GET['_idCategory']) && isset($_GET["_nameProduct"]) && isset($_GET["_priceProduct"])
        && isset($_GET["_nameCategory"]) 
        && isset($_GET["_typeProduct"]) && isset($_GET["_originProduct"])
        && isset($_GET["_branchProduct"])&& isset($_GET["_imageProduct"]))
    {   
        $idProduct = $_GET["_idProduct"];
        $idCategory = $_GET["_idCategory"];
        $nameProduct = $_GET["_nameProduct"];
        $priceProduct = $_GET["_priceProduct"];
        $nameCategory = $_GET["_nameCategory"];
        $typeProduct = $_GET["_typeProduct"];
        $originProduct = $_GET["_originProduct"];
        $branchProduct = $_GET["_branchProduct"];
        $imageProduct = $_GET["_imageProduct"];

        $sql = " UPDATE product SET categoryId = (SELECT _idCategory FROM Category WHERE _idCategory = $idCategory), 
        _nameProduct = '$nameProduct', _priceProduct = $priceProduct, _nameCategory = '$nameCategory', _typeProduct = '$typeProduct',
        _originProduct = '$originProduct', _branchProduct = '$branchProduct', _imageProduct = '$imageProduct'
                            WHERE _idProduct = '$idProduct' ";


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
        $response['result'] = "false";
        $response['message'] = " Thiếu dữ liệu";
    }

    
    mysqli_close($conn);
?>