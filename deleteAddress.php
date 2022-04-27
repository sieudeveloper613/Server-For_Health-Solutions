<?php

require "connect.php";

$response = array();

if(isset($_GET["idAddress"]) && isset($_GET["idCustomer"])){
    $id = $_GET["idCustomer"];
    $idAddress = $_GET["idAddress"];
   
            $query = "DELETE FROM address WHERE 
            idAddress = (SELECT idAddress FROM Customer WHERE idAddress = $id) AND 
            address.idAddress = $idAddress";

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