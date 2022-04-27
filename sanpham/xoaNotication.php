<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM notifications where idNotification = $id";
    $query = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>      