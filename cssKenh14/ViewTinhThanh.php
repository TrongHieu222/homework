<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM devvn_quanhuyen";
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($sql);
$ket_qua = mysqli_query($conn,$sql);
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>mã quận huyện</td>
            <td>name</td>
            <td>type</td>
            <td>mã tp</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>".$row["maqh"]."</td>";
                   echo "<td>".$row["name"]."</td>";
                   echo "<td>".$row["type"]."</td>";
                   echo "<td>".$row["matp"]."</td>";
                   echo "<td><a href=\"xlxoa.php/?id=".$row["maqh"]."\">xóa</a></td>";

                }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</body>
</html>