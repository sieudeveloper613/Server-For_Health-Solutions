<?php

require "connect.php";

$response = array();

if(isset($_GET["_avatar"]) && isset($_GET["_id"])){
    $avatar = $_GET["_avatar"];
    $id = $_GET["_id"];
    
        if($conn){
            $sql = "UPDATE customer SET _avatar = '$avatar' where _id = $id";
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

    // $file_path = "Customer_Image/";
    // $file_path = $file_path.basename($_FILES['uploaded_file']['name']);

    // if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)){
    //     echo $_FILES['uploaded_file']['name'];
    // }else{
    //     echo "Failed";
    // }
?>
