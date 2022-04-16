<?php

require "connect.php";

$response = array();

if(isset($_GET["idQuote"])){
    $idQuote = $_GET["idQuote"];
    
   
            $query = "DELETE FROM Quotes WHERE idQuote = $idQuote";
             
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