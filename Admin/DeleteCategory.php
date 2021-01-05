<?php include('../Fontend/Header.php'); ?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('../Fontend/Function.php'); ?>
<?php include('SidebarAdmin.php'); ?>

    <div id="content">
        <?php
        if (isset($_GET['cid'], $_GET['cat_name']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
            $cid = $_GET['cid'];
            $catName = $_GET['cat_name'];
            // Neu cid va cat_name ton tai, thi se xoa category khoi csdl
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Xu ly form
                if (isset($_POST['delete']) && ($_POST['delete'] == 'yes')) {
                    // Neu muon delete category
                    $q = "DELETE FROM categories WHERE cat_id = {$cid} LIMIT 1";
                    $r = mysqli_query($dbc, $q);
                    confirmQuery($r, $q);
                    if (mysqli_affected_rows($dbc) == 1) {
                        // Xoa thanh cong, bao cho nguoi dung biet
                        $messages = "<p class='success'>The category was deleted successfully.</p>";
                    } else {
                        $messages = "<p class='warning'>The category was not deleted due to a system error.</p>";
                    }
                } else {
                    // Ko muon delete category
                    $messages = "<p class='warning'>I thought so too! shouldn't be deleted.</p>";
                }
            }
        } else {
            // Neu CID va cat_name khong ton tai, hoac khong dung dinh dang mong muon
            redirectTo('admin/view_categories.php');
        }
        ?>
        <h2> Delete Category:<?php if (isset($cat_name)) echo htmlentities($cat_name, ENT_COMPAT, 'UTF-8') ?></h2>
        <?php if (!empty($messages)) echo $messages; ?>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Category</legend>
                <label for="delete">Are you sure?</label>
                <div>
                    <input type="radio" name="delete" value="no" checked="checked"/> No
                    <input type="radio" name="delete" value="yes"/> Yes
                </div>
                <div><input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure?');"/>
                </div>
            </fieldset>
        </form>
    </div><!--end content-->

<?php include('../Fontend/Footer.php'); ?>