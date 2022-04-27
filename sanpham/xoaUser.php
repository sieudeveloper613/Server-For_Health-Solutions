<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM customer where idCustomer = $id";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=quanLyUser');
    
?>      