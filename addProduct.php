<?php

    require_once 'connect.php';

    $response = array();

    if(isset($_GET['idCategory']) && isset($_GET["nameProduct"]) && isset($_GET["priceProduct"])
        && isset($_GET["nameCategory"]) 
        && isset($_GET["nameType"]) && isset($_GET["originProduct"])
        && isset($_GET["branchProduct"])&& isset($_GET["imageProduct"])
        && isset($_GET["contentProduct"]))
    {
        
        $idCategory = $_GET["idCategory"];
        $idType = $_GET["idType"];
        $nameProduct = $_GET["nameProduct"];
        $priceProduct = $_GET["priceProduct"];
        $nameCategory = $_GET["nameCategory"];
        $typeProduct = $_GET["nameType"];
        $originProduct = $_GET["originProduct"];
        $branchProduct = $_GET["branchProduct"];
        $imageProduct = $_GET["imageProduct"];
        $contentProduct = $_GET["contentProduct"];

        $sql = "INSERT INTO Product (idCategory, idType, nameProduct, priceProduct, nameType, 
                                     originProduct, branchProduct, imageProduct, contentProduct) 
                    VALUES ((SELECT idCategory FROM Category WHERE idCategory = $idCategory),
                            (SELECT idType FROM Types WHERE idType = $idType),
                            '$nameProduct', $priceProduct, (SELECT nameCategory FROM Category WHERE idCategory = $idCategory),
                            (SELECT nameType FROM Types WHERE idType = $idType), '$originProduct',
                            '$branchProduct', '$imageProduct', '$contentProduct')"; 

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