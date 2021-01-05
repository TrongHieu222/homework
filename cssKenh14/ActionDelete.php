<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$id = $_GET["id"];
//$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "DELETE * FROM devvn_quanhuyen WHERE 'maqh'=$id";
echo $sql;
//$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($sql);
$ket_qua = mysqli_query($conn,$sql);


?>