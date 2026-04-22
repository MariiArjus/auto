<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cars";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Ühendus ebaõnnestus: " . $conn->connect_error);
}
?>