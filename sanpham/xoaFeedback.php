<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM feedback where idFeedback = $id";
    $query = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>      