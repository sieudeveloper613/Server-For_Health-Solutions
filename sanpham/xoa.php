<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM product where idProduct = $id";
    $query = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>      