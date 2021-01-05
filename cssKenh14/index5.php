<!--<!--<!--<table border="1px">-->-->-->
<!--<!--<!--    <tr>-->-->-->
<!--<!--<!--        -->-->--><?php
//////        for($i = 1; $i < 10; $i ++) {
//////            echo "<td>";
//////            for($j = 1; $j <= 10; $j ++) {
//////                echo "$i x $j = " . ($i * $j);
//////                echo "<br>";
//////            }
//////            echo "</td>";
//////        }
//////        ?>
<!--<!--<!--    </tr>-->-->-->
<!--<!--<!--</table>-->-->-->
<!--<!---->-->
<?php
////
////$tong = 0;
////   for ($i=1; $i<=2;$i++){
////       $tong = $tong + ($i*$i);
////   }
////   echo $tong;
////
////?>
<!--<!---->-->
<?php
////$i=0;
////$tong = 0;
////
////        for ($i=1; $i<=100;$i++){
////            if ($i%2==0){
////            $tong = $tong + ($i*$i);}
////    }
////
////
////   echo $tong;
////
////?>
<!--<!---->-->
<?php
////$tong=0;
////function isPrimeNumber($n) {
////    // so nguyen n < 2 khong phai la so nguyen to
////    if ($n < 2) {
////        return false;
////    }
////    // check so nguyen to khi n >= 2
////    $squareRoot = sqrt ( $n );
////    for($i = 2; $i <= $squareRoot; $i ++) {
////        if ($n % $i == 0) {
////            return false;
////        }
////    }
////    return true;
////}
////
////echo ("Các số nguyên tố nhỏ hơn 100 là: <br>");
////for($i = 0; $i < 100; $i ++) {
////    if (isPrimeNumber ( $i )) {
////        echo ($i . " ");
////    }
////    $tong = $tong +$i;
////
////
////}
////echo $tong;
////?>
<!---->
<?php
////$servername = "localhost";
////$username = "root";
////$password = "";
////$dbname = "test";
////
////// Create connection
////$conn = mysqli_connect($servername, $username, $password, $dbname);
////
////// Check connection
////if (!$conn) {
////    die("Connection failed: " . mysqli_connect_error());
////}
////echo "Connected successfully";
////?>
<?php
////$ten=$_POST[ten];
////$ho=$_POST[ho];
////$tendem=$_POST[tendem];
////$sql = "INSERT INTO sv (ten, ho, tendem)
////VALUES ('$ten', '$ho', '$tendem')";
////
////
////if ($conn->query($sql) === TRUE) {
////echo "New record created successfully";
////} else {
////echo "Error: " . $sql . "<br>" . $conn->error;
////}
////
////$conn->close();
////?>
<!--<!--<!doctype html>-->-->
<!--<!--<html lang="en">-->-->
<!--<!--<head>-->-->
<!--<!--    <meta charset="UTF-8">-->-->
<!--<!--    <meta name="viewport"-->-->
<!--<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->-->
<!--<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->-->
<!--<!--    <title>Document</title>-->-->
<!--<!--</head>-->-->
<!--<!--<body>-->-->
<!--<!--<form action="" method="post">-->-->
<!--<!--    <input type="submit" value="thêm">-->-->
<!--<!---->-->
<!--<!--    <input type="text" name="ten">tên-->-->
<!--<!--    <input type="text" name="ho">họ-->-->
<!--<!--    <input type="text" name="tendem">tên đệm-->-->
<!--<!--</form>-->-->
<!--<!--</body>-->-->
<!--<!--</html>-->-->
<!---->
<!---->
<!---->
<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "test";
//
//// Create connection
//$conn = mysqli_connect($servername, $username, $password,$dbname);
//
//// Check connection
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
//?>
<!---->
<!---->
<!---->
<!---->
<?php
//$ten= $_POST[ten];
//$ho= $_POST[ho];
//$tendem= $_POST[tendem];
//
//$sql = "INSERT INTO sv (ten, ho, tendem)
//VALUES ('$ten', '$ho', '$tendem')";
//
//if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
//} else {
//echo "Error: " . $sql . "<br>" . $conn->error;
//}
//
//$conn->close();
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">  -->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--<form action=""method="post">-->
<!--    <input type="submit" value="thêm mới">-->
<!--    tên <input type="text" name="ten">-->
<!--    họ <input type="text" name="ho">-->
<!--    tendem <input type="text" name="tendem">-->
<!--</form>-->
<!---->
<!--</body>-->
<!--</html>-->





<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ten=$_POST[ten];
$truong=$_POST[truong];
$diachi=$_POST[diachi];

$sql = "INSERT INTO hocsinh (ten, truong, diachi)
VALUES ('$ten', '$truong', '$diachi')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<?php
//$sql = "SELECT id, ten, truong, diachi FROM hocsinh";
//$result = $conn->query($sql);
//
//$ket_qua = mysqli_query($conn,$sql);
//
//if (!$ket_qua) {
//    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
//    exit();
//}
//
////Dùng vòng lặp while truy xuất các phần tử trong table
//while ($row = mysqli_fetch_array($ket_qua)) {
//    echo "<p>id: " . $row['id'] . "</p>";
//    echo "<p>Tiêu đề: " . $row['ten'] . "</p>";
//    echo "<p>Ngày: " . $row['truong'] . "</p>";
//    echo "<p>Mô tả: " . $row['diachi'] . "</p>";
//
//    echo "<hr>";
//}
//$conn->close();
//?>


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
<form action="" method="post">
    <input type="submit" value="Thêm">
    tên <input type="text" name="ten">
    trường <input type="text" name="truong">
    địa chỉ <input type="text" name="diachi">
</form>


</body>
</html>