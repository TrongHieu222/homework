<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    require_once ('ConnectSqli.php');
    $sql = 'delete from student where id = '.$id;
    execute($sql);

    echo 'Xoá sinh viên thành công';
}