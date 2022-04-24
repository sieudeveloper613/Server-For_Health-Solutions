<?php

    require "connect.php";

    $response = array();

    if(isset($_GET["idCategory"])){
        $id = $_GET["idCategory"];

        if($conn){

            $sql = "SELECT * FROM types WHERE idCategory = (SELECT idCategory FROM Category WHERE idCategory = $id)";
            $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
           
                $response["typeList"] = array();
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $typeList = array();
                    $typeList['idCategory'] = $row['idCategory'];
                    $typeList['idType'] = $row['idType'];
                    $typeList['nameType'] = $row['nameType'];
                    $typeList['imageType'] = $row['imageType'];
                    
                
                array_push($response['typeList'], $typeList);
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