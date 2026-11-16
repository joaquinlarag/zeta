<?php
$servername = "localhost:3306";
$username = "cze46896_uszet96";
$password = "Z09.987hFFr+**lR";
$dbname = "cze46896_zeta95";

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "zetabd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_set_charset( $conn, 'utf8');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
