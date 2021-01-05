<?php
//xac dinh hang so cho dia chi tuyet doi
define('BASE_URL', 'http://localhost/demo-izcms/');
// kiem tra ket qua trả về có đúng k?
function confirmQuery($result, $query)
{
    global $dbc;
    if (!$result && !LIVE) {
        die("Query {$query} \n<br/> MySQL Error: " . mysqli_error($dbc));
    }
}


function redirectTo($page = 'index.php')
{
    $url = BASE_URL . $page;
    header('Location: $url');
    exit();
}

?>