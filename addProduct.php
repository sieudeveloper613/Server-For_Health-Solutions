<?php

    require_once 'connect.php';

    $response = array();

    if(isset($_GET['_idCategory']) && isset($_GET["_nameProduct"]) && isset($_GET["_priceProduct"])
        && isset($_GET["_nameCategory"]) 
        && isset($_GET["_typeProduct"]) && isset($_GET["_originProduct"])
        && isset($_GET["_branchProduct"])&& isset($_GET["_imageProduct"]))
    {
        
        $idCategory = $_GET["_idCategory"];
        $nameProduct = $_GET["_nameProduct"];
        $priceProduct = $_GET["_priceProduct"];
        $nameCategory = $_GET["_nameCategory"];
        $typeProduct = $_GET["_typeProduct"];
        $originProduct = $_GET["_originProduct"];
        $branchProduct = $_GET["_branchProduct"];
        $imageProduct = $_GET["_imageProduct"];
    
        $sql = "INSERT INTO Product (_idCategory, _nameProduct, _priceProduct, _typeProduct, 
                                     _originProduct, _branchProduct, _imageProduct) 
                    VALUES ((SELECT _idCategory FROM Category WHERE _idCategory = $idCategory),
                            '$nameProduct', $priceProduct,(SELECT _nameCategory FROM Category WHERE _idCategory = $idCategory),
                            '$typeProduct', '$originProduct',
                            '$branchProduct', '$imageProduct')"; 

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
        $response['message'] = "Less Info";
    }

    
    mysqli_close($conn);
?>