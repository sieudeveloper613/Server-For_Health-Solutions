<?php

    require_once 'connect.php';

    $response = array();

    if(isset($_GET['categoryId']) && isset($_GET["name"]) && isset($_GET["price"]) 
        && isset($_GET["categoryName"]) && isset($_GET["typeProduct"]) && isset($_GET["whereProduct"])
        && isset($_GET["branchProduct"])&& isset($_GET["image"]))
    {
        
        $categoryId = $_GET["categoryId"];
        $name = $_GET["name"];
        $price = $_GET["price"];
        $categoryName = $_GET["categoryName"];
        $typeProduct = $_GET["typeProduct"];
        $whereProduct = $_GET["whereProduct"];
        $branchProduct = $_GET["branchProduct"];
        $image = $_GET["image"];
    
        $sql = "INSERT INTO product (categoryId, name, price, categoryName, typeProduct, whereProduct
        , branchProduct, image) 
                    VALUES ( '$categoryId', '$name', '$price', '$categoryName', '$typeProduct', $whereProduct
                    ,'$branchProduct', '$image')"; 

        $result = mysqli_query($conn, $sql);

        if($result){
            $status = "success";
            $result = 1;
            $response['status'] = $status;
            $response['result'] = $result;
            echo json_encode($response);
        }else{
            $status = "failed";
            $result = 0;
            $response['status'] = $status;
            $response['result'] = $result;
            echo json_encode($response);
        }

    }else{
        $response['result'] = "false";
        $response['message'] = "Less Info";
    }

    
    mysqli_close($conn);
?>