<?php

    require "connect.php";

    $response = array();

    if($conn){
        $sql = "SELECT * FROM Quotes";
        $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       
            $response["quoteList"] = array();
            // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $quote = array();
            $quote['idQuote'] = $row['idQuote'];
            $quote['titleQuote'] = $row['titleQuote'];
            $quote['contentQuote'] = $row['contentQuote'];
            $quote['imageQuote'] = $row['imageQuote'];
            
            
            //$response["product"] = $product;
            array_push($response['quoteList'], $quote);
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

    //echo json_encode($response);
    mysqli_close($conn);
?>