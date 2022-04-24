<?php

require "connect.php";

$response = array();

if(isset($_GET["idCustomer"]) && isset($_GET["idFeedback"])){
    $id = $_GET["idCustomer"];
    $idFeedback = $_GET["idFeedback"];
   
            $query = "DELETE FROM Feedback WHERE 
            idCustomer = (SELECT idCustomer FROM Customer WHERE idCustomer = $id) AND 
            idFeedback = $idFeedback";

            
             
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