<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "HealthSolutions";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);
//mysqli_set_charset($conn, "utf8");

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Truy cập thành công nhé";

?>