<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hien thi danh sach</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "SELECT id, hoten, ngaysinh, gioitinh, diachi FROM testdb";
$result = $conn->query($sql);


$conn->close();
?>

<body>
        <table boder="10px">
            <tr>
                <td>STT</td>
                <td>Ho ten</td>
                <td>Ngaysinh</td>
                <td>Gioitinh</td>
                <td>Diachi</td>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   echo "<tr>";
\
                   echo "<td>".$row["hoten"]."</td>";
                   echo "<td>".$row["ngaysinh"]."</td>";
                   echo "<td>".$row["gioitinh"]."</td>";
                   echo "<td>".$row["diachi"]."</td>";
                }
            } else {
                echo "0 results";
            }
            ?>

        </table>
</body>
</html>