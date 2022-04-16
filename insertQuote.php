
<?php

require "connect.php";

$response = array();

if(isset($_GET["titleQuote"]) && isset($_GET["contentQuote"]) && isset($_GET["imageQuote"])){
   
    $title = $_GET["titleQuote"];
    $content = $_GET["contentQuote"];
    $image = $_GET["imageQuote"];


    if($conn){
        $query = "INSERT INTO quotes (titleQuote, contentQuote, imageQuote)
                                VALUES ('$title', '$content', '$image')";
                            
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
        $status = "FAILED";
        $result = 0;
        $response["status"] = $status;
        $response["result"] = $result;
        echo json_encode($response);
    }

}else{
    echo "???";
}
    mysqli_close($conn);
?>
