<?php

require "connect.php";

$response = array();

if(isset($_GET["_idAddress"]) && isset($_GET["_id"])){
    $id = $_GET["_id"];
    $idAddress = $_GET["_idAddress"];
   
            $query = "DELETE FROM address WHERE _id = (SELECT _id FROM Customer WHERE _id = $id) AND 
                                                address._idAddress = $idAddress";

            // $sql = "DELETE FROM address WHERE address._idAddress = $idAddress";
             
            $result = mysqli_query($conn, $query);

            if($result){
                $status = "SUCCESS";
                $result = 1;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);

            }else{
                $status = "FAILED";
                $result = 0;
                $response["status"] = $status;
                $response["result"] = $result;
                echo json_encode($response);
            }
    
        

}else{
    echo "none";
}

    mysqli_close($conn);

?>