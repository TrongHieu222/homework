<?php
require_once ('ConnectSqli.php');

$sFullname = $sAge = $sAddress = '';

if (!empty($_POST)) {
    $sId = '';

    if (isset($_POST['fullname'])) {
        $sFullname = $_POST['fullname'];
    }

    if (isset($_POST['age'])) {
        $sAge = $_POST['age'];
    }

    if (isset($_POST['address'])) {
        $sAddress = $_POST['address'];
    }

    if (isset($_POST['id'])) {
        $sid = $_POST['id'];
    }

    $sFullname = str_replace('\'', '\\\'', $s_fullname);
    $sAge      = str_replace('\'', '\\\'', $s_age);
    $sAddress  = str_replace('\'', '\\\'', $s_address);
    $sId       = str_replace('\'', '\\\'', $s_id);

    if ($sId != '') {
        //update
        $sql = "update student set fullname = '$sFullname', age = '$sAge', address = '$sAddress' where id = " .$sId;
    } else {
        //insert
        $sql = "insert into student(fullname, age, address) value ('$sFullname', '$sAge', '$sAddress')";
    }

    // echo $sql;

    execute($sql);

    header('Location: User.php');
    die();
}

$id = '';
if (isset($_GET['id'])) {
    $id          = $_GET['id'];
    $sql         = 'select * from student where id = '.$id;
    $studentList = executeResult($sql);
    if ($studentList != null && count($studentList) > 0) {
        $std        = $studentList[0];
        $sFullname = $std['fullname'];
        $sAge      = $std['age'];
        $sAddress  = $std['address'];
    } else {
        $id = '';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registation Form * Form Tutorial</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Add Student</h2>
        </div>
        <div class="panel-body">
            <form method="post">
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="number" name="id" value="<?=$id?>" style="display: none;">
                    <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$sFullname?>">
                </div>
                <div class="form-group">
                    <label for="birthday">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?=$sAge?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?=$sAddress?>">
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>