<?php

require_once "connect.php";

$response = array();

    if(isset($_GET["titleKnowledge"]) && isset($_GET["contentKnowledge"]) && isset($_GET["imageKnowledge"])) {
        $title = $_GET["titleKnowledge"];
        $content = $_GET["contentKnowledge"];
        $image = $_GET["imageKnowledge"];

        if($conn){
            $insertKnowledge = "INSERT INTO Knowledge(titleKnowledge, contentKnowledge, imageKnowledge) 
                               VALUES ('$title', '$content', '$image')";

            $result = mysqli_query($conn, $insertKnowledge);
            if($result){
                $status = "SUCCESS";
                $result = 1;
                
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