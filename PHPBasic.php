<?php
// cách đặt tên variable{phân biệt chữ hoa chữ thường + cú pháp con lạc đà}

//String
//strlen() - Return the Length of a String


echo strlen("Hello world!"); // outputs độ dài chuỗi 12 ký tự

$variable = 'tronghieu';
echo "toila... \$variable";

//explode($separator, $string, $limit) nối chuỗi

$data = explode('o', "TrongHIeu");

print_r($data);
//output: Array ( [0] => Tr [1] => ngHieu  )
$data = explode('o', "TrongHieu", 1);

print_r($data);
//output: Array ( [0] => Tr  )


//implode($separator, $array) tách chuỗi

$data = [
    'T',
    'R',
    'ONG',
    'Hi',
    'e',
    'u'
];
   echo implode($data) . "<br>";
//output: TrongHieu


//strlen($string)
$data= "TrongHieu";
echo strlen($data);
//output: 9

//str_word_count($string)
$data = "TrongHieu.com";
echo str_word_count($data);
//output: 2


//str_repeat($string, $repeat)
$data = "TrongHieu";
echo str_repeat($data,2);
//output: TrongHieuTrongHieu


//str_replace($find, $replace, $string)
$data = "trongHieu";
echo str_replace("t","T",$data);
//output: TrongHieu


//substr(string,start,length)
echo substr("Trong Hieu",7 ) . "<br>"; //u
echo substr("Trong Hieu", -1) . "<br>"; //u
echo substr("Trong Hieu", 0, 9) . "<br>"; //Trong Hie
echo substr("Trong Hieu", 0, -1) . "<br>"; //Trong Hie


//strtolower($string)
echo strtolower("TRONGHIEU.COM");
//output: tronghieu.com


//strtoupper($string)
echo strtoupper("tronghieu.com");
//output: TRONGHIEU.COM

//constant
function dienTichHinhTron($banKinh, $PI){
//    define("PI", "3.14");
    return $PI*$banKinh**2;
}

echo "dien tich hinh trong la : " . dienTichHinhTron(9,3.14);


//if-else
$month =9;

    if ($month == 1 && $month==3 && $month == 5 && $month==7 && $month==8 && $month==10 && $month==12 ){
        echo "thang nay co 31 ngay";
    }elseif ($month == 4 && $month==6 && $month == 9 && $month==11 ){
        echo "thang nay co 30 ngay";
    }else{

        echo "thang nay co 28 hoac 29 ngay";
       
    }


//switch
    $monthh = 1;
    switch($month){
        case 1;
        case 3;
        case 5;
        case 7;
        echo "thang nay co 31 ngay";
        break;
        case 4;
        echo "thang nay co 31 ngay";
        break;
        case 2;
        echo "thang nay co 29 hoac 28 ngay";
    }

//Array and for

$bangcuuchuong = array(1,2,3,4,5,6,7,8,9);
    for($i=0;$i<=9;$i++){
        for($j=1;i<=10;$i++){
            $bangcuuchuong[$i]*$j;
        }
        
    }

    













?>
