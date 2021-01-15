<?php
/** php có 3 phạm vi biến
 * global
 * local
 * static
 */

//$x = 5;
//$y = 10;
//function myTest()
//{
//    global $x, $y;
//    $y = $x + $y;
//}
//myTest();
//echo $y;

//function myTest()
//{
//    $x = 5; // local scope
//    echo "<p>Variable x inside function is: $x</p>";
//}
//myTest();
//// using x outside the function will generate an error
//echo "<p>Variable x outside function is: $x</p>";

//function myTest()
//{
//    static $x = 0;
//    echo $x;
//    $x++;
//}
//myTest();
//echo "<br>";
//myTest();
//echo "<br>";
//myTest();


/**
 *  Numberic Array + Associative Array
 * Nuberric Array sử dụng chỉ số làm khóa truy cập
 * Mảng kết hợp khác với mảng chỉ số theo nghĩa là mảng kết hợp sử dụng Tên mô tả cho các Access Key.
 */

//$aName = [
//    0 => "hieu",
//    1 => "hai",
//    2 => "hung",
//    3 => "huong"
//];
//echo $aName[1]; // hai
//
//$aPersons = [
//    "hieu" => "nam",
//    "hai" => "nam",
//    "hung" => "nam",
//    "huong" => 'nu',
//];
//echo "Hieu la " . $aPersons["hieu"]; // Hieu la nam


/**
 * Nêu tất cả các cách có thể để thêm một phần tử vào mảng
 */

//// Them phan tu vao cuoi mang
//$aListnumber = array(1, 3, 5, 7);
//$aListnumber = 9;
//
////Thêm phần tử bởi một key xác định trước
//$aStudent = [
//    '08T1016' => "Phan Văn Cương",
//    '08T1013' => "Nguyễn Văn Hoàng",
//    '08T1015' => "Bùi Việt Đức",
//];
//$aStudent['08T1019'] = "Trần Thị Hằng";
//
////Cập nhật giá trị phần tử trong mảng
//$aListcolor = array('Green', 'Red', 'Blue');
//// Cập nhật giá trị Green bằng Back
//$aListcolor[0] = Black;


/**
 * Ứng dụng array_search
 * Tìm kiếm giá trị trong mảng trả về khóa
 */

//$aArray=["a"=>"red","b"=>"green","c"=>"blue"];
//echo array_search("red",$aArray); // a
//
//$bArray=["a"=>"5","b"=>5,"c"=>"5"];
//echo array_search(5,$bArray,true); // b
//
//$aArr = ["p"=>20,"q"=>20,"r"=>30,"s"=>40];
//echo array_search(20,$aArr,true);// p

/**
 *Giải thich function nhận vào tham số là optional.Nên đặt optional param trước hay sau required param
 * Danh sách tham số nhiều khi chỉ là hình thức.PHP cho phép truyền bất kỳ thứ gì vào hàm miễn là hàm
 * có khả năng  xử lý
 */
//
//function sum() {
//    $args = func_get_args();
//    $s = 0;
//    foreach ($args as $num) {
//        if (is_numeric($num))
//            $s += $num;
//    }
//    return $s;
//}
//
//echo sum(1, 2, 3, 4, 5); // kết quả 15
//echo sum(1, 2, 3, '4', 'abc', 5); // kết quả 15



/**
 * Ứng dụng array_map
 */
//$newFunction = function ($value){
//  return $value * 2 ;
//};
//print_r(array_map($newFunction, range(1,3)));


/**
 * Ứng dụng array_sreach
 */
//$aNumber = [2,7,11,15];
//for ($i=0; $i<3 ;$i++){
//    for ($j=0;$j<4;$j++){
//        if ($aNumber[$i]+$aNumber[$j]==9){
//            echo array_search($aNumber[$i], $aNumber) . array_search($aNumber[$i], $aNumber);
//        }
//    }
//}



$aNumber = [3,2,4];
for ($i=0; $i<2 ;$i++){
    for ($j=0;$j<3;$j++){
        if ($aNumber[$i]*$aNumber[$j]==12){
            echo array_search($aNumber[$i], $aNumber) . "---".array_search($aNumber[$j], $aNumber)."</br>";
//            echo $i."---".$j."</br>";
        }
    }
}
