<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$sql = "SELECT * FROM hocsinh";
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($sql);
$ket_qua = mysqli_query($conn,$sql);

if (!$ket_qua) {
    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
    exit();
}

//Dùng vòng lặp while truy xuất các phần tử trong table
while ($row = mysqli_fetch_array($ket_qua)) {
    echo "<p>id: " . $row['id'] . "</p>";
    echo "<p>tên: " . $row['ten'] . "</p>";
    echo "<p>trường: " . $row['truong'] . "</p>";
    echo "<p>địa chỉ: " . $row['diachi'] . "</p>";
    echo "<hr>";
}
?>