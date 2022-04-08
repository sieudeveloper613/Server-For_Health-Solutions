<?php

    require_once 'connect.php';
    $response = array();
    if(isset($_GET["Ids"])){
        $Ids = $_GET["Ids"];

        if($conn){
            $sql = "SELECT * FROM product where Ids = $Ids";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $product = array();
                    $product['Ids'] = $row['Ids'];
                    $product['categoryId'] = $row['categoryId'];
                    $product['name'] = $row['name'];
                    $product['price'] = $row['price'];
                    $product['categoryName'] = $row['categoryName'];
                    $product['typeProduct'] = $row['typeProduct'];
                    $product['whereProduct'] = $row['whereProduct'];
                    $product['branchProduct'] = $row['branchProduct'];
                    $product['image'] = $row['image'];
                
                    $status = "success";
                    $result = 1;
                    $response["product"] = $product;
                    $response["status"] = $status;
                    $response["result"] = $result;
    
                    echo json_encode($response);
    
            } else {
                    $status = "failed";
                    $result = 0;
                    $response["status"] = $status;
                    $response["result"] = $result;
                    
                    echo json_encode($response);
                }
        }else{
            $status = "failed";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
    }

    


   mysqli_close($conn);
?>