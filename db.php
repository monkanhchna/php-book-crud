<?php
$servername="localhost";
$dbname="bookdb";
$username="root";
$password="20050408";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connect error" . $conn->connect_error);
} else {
    echo "";
}
?>