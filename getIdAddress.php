<?php

    require "connect.php";

    $response = array();

    if(isset($_GET["idAddress"])){
        $id = $_GET["idAddress"];
        
            if($conn){
                $sql = "SELECT idAddress FROM Address WHRER idAddress = $id";
                $result = mysqli_query($conn, $sql);
        
                
                $status = "SUCCESS";
                $result = 1;
                $response["idAddress"] = $id;
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

    

    //echo json_encode($response);
    mysqli_close($conn);
?>