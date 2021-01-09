<?php include('../fontend/Header.php'); ?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('../Fontend/Function.php'); ?>
<?php include('SidebarAdmin.php'); ?>


<?php
// xac nhan bien get ton tai va thuoc loai du lieu cho phep
if (isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $cid = $_GET['cid'];
} else {
    redirectTo('Admin/Admin.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Gia tri tri ton tai, xu ly form.
    $aErrors = array();
    // Kiem tra ten cua category
    if (empty($_POST['category'])) {
        $aErrors[] = "category";
    } else {
        $catName = mysqli_real_escape_string($dbc, strip_tags($_POST['category']));
    }

    // Kiem tra position cua category
    if (isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $position = $_POST['position'];
    } else {
        $aErrors[] = "position";
    }

    if (empty($errors)) {
        // Neu khong co loi xay ra, thi chen vao csdl.
        $q = "UPDATE categories SET cat_name = '{$catName}', position = $position WHERE cat_id = {$cid} LIMIT 1";
        $r = mysqli_query($dbc, $q);
        confirmQuery($r, $q);

        if (mysqli_affected_rows($dbc) == 1) {
            $messages = "<p class='success'>The category was edited successfully.</p>";
        } else {
            $messages = "<p class='warning'>Could not edit the category due to a system error.</p>";
        }
    } else {
        $messages = "<p class='warning'>Please fill all the required fields</p>";
    }
} // END main IF submit condition
?>


<div id="content">
    <?php
    $q = "SELECT cat_name, position FROM categories WHERE cat_id = {$cid}";
    $r = mysqli_query($dbc, $q);
    confirmQuery($r, $q);
    if (mysqli_num_rows($r) == 1) {
        // Neu category ton tai trong database, dua vao CID, xuat du lieu ra ngoai trinh duyet
        list($catName, $position) = mysqli_fetch_array($r, MYSQLI_NUM);
    } else {
        // Neu CID khong hop le, se khong the hien thi category
        $messages = "<p class='warning'>The category does not exist.</p>";
    }
    ?>
    <h2>Edit category: <?php if (isset($catName)) echo $catName; ?></h2>
    <?php if (!empty($messages)) echo $messages; ?>
    <form id="edit_cat" action="" method="post">
        <fieldset>
            <legend>Edit category</legend>
            <div>
                <label for="category">Category Name: <span class="required">*</span>
                    <?php
                    if (isset($errors) && in_array('category', $errors)) {
                        echo "<p class='warning'>Please fill in the category name</p>";
                    }
                    ?>

                </label>
                <input type="text" name="category" id="category" value="<?php if (isset($catName)) echo $catName; ?>"
                       size="20" maxlength="150" tabindex="1"/>
            </div>
            <div>
                <label for="position">Position: <span class="required">*</span>
                    <?php
                    if (isset($errors) && in_array('position', $errors)) {
                        echo "<p class='warning'>Please pick a position</p>";
                    }
                    ?>

                </label>
                <select name="position" tabindex='2'>
                    <?php
                    $q = "SELECT count(cat_id) AS count FROM categories";
                    $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " . mysqli_error($dbc));
                    if (mysqli_num_rows($r) == 1) {
                        list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                        for ($i = 1; $i <= $num + 1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                            echo "<option value='{$i}'";
                            if (isset($position) && ($position == $i)) echo "selected='selected'";
                            echo ">" . $i . "</otption>";
                        }
                    }
                    ?>
                </select>
            </div>
        </fieldset
        <p><input type="submit" name="submit" value="Add Category"></p>
    </form>


</div>

<?php include('../fontend/Sidebar-b.php'); ?>
<?php include('../fontend/Footer.php'); ?>
