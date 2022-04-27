<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM types where idType = $id";
    $query = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>      