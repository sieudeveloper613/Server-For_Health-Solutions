<?php

require "connect.php";

$response = array();

if(isset($_GET["idQuote"]) && isset($_GET['titleQuote']) && isset($_GET["contentQuote"]) && isset($_GET["imageQuote"])){
    $idQuote = $_GET["idQuote"];
    $titleQuote = $_GET["titleQuote"];
    $contentQuote = $_GET["contentQuote"];
    $imageQuote = $_GET["imageQuote"];
    
        if($conn){
            $sql = "UPDATE Quotes SET titleQuote = '$titleQuote', contentQuote = '$contentQuote',
            imageQuote = '$imageQuote' where idQuote = $idQuote";
            $result = mysqli_query($conn, $sql);

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
                //echo json_encode(array('email' => $email, 'status' => $status, 'result' => $result));
    
            }
    
        }else{
            $status = "FAILED";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
}else{
    echo "????";
}

    mysqli_close($conn);

?>