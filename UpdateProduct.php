<?php

    require_once 'connect.php';

    $db = new DBConnect();

    $response = array();

    if(isset($_GET['categoryId']) && isset($_GET["name"]) && isset($_GET["price"]) 
        && isset($_GET["categoryName"]) && isset($_GET["typeProduct"]) && isset($_GET["whereProduct"])
        && isset($_GET["branchProduct"])&& isset($_GET["image"]))
    {
        $Ids = $_GET["Ids"];
        $categoryId = $_GET["categoryId"];
        $name = $_GET["name"];
        $price = $_GET["price"];
        $categoryName = $_GET["categoryName"];
        $typeProduct = $_GET["typeProduct"];
        $whereProduct = $_GET["whereProduct"];
        $branchProduct = $_GET["branchProduct"];
        $image = $_GET["image"];

        $sql = "UPDATE product SET categoryId = '$categoryId', name = '$name',
        price = '$price', categoryName = '$categoryName', typeProduct = '$typeProduct',
        whereProduct = '$whereProduct', branchProduct = '$branchProduct', image = '$image'
                            WHERE Ids = '$Ids'";


        $result = $db->conn->query($sql);

        if ($result === TRUE) {
            $response['result'] = "true";
        } else {
            $response['result'] = "false";
            $response['message'] = " Update lỗi";
        }      
    }else{
        $response['result'] = "false";
        $response['message'] = " Thiếu dữ liệu";
    }

    
    echo json_encode($response);
?>