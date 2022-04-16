<?php

require_once "connect.php";

$response = array();

    if(isset($_GET["nameCategory"]) && isset($_GET["idCategory"])){
        $nameCategory = $_GET["nameCategory"];
        $idCategory = $_GET["idCategory"];

        if($conn){
            $insertCategory = "INSERT INTO Category (nameCategory) VALUES ('$nameCategory')";

            $result = mysqli_query($conn, $insertCategory);
            if($result){
                $status = "SUCCESS";
                $result = 1;
                $response['idCategory'] = $idCategory;
                $response['nameCategory'] = $nameCategory; 
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