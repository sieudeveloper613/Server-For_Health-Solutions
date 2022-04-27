<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM category where idCategory = $id";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=danhMuc');
    
?>      