<?php include('../fontend/Header.php');?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('SidebarAdmin.php');?>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Gia tri tri ton tai, xu ly form.
    $aErrors = array();
    if(empty($_POST['category'])) {
        $aErrors[] = "category";
    } else {
        $catName = mysqli_real_escape_string($dbc,strip_tags($_POST['category']));
    }
    if(isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $position = $_POST['position'];
    } else {
        $aErrors[] = "position";
    }
    if(empty($errors)) {
        // Neu khong co loi xay ra, thi chen vao csdl.
        $q = "INSERT INTO categories (user_id, cat_name, position) VALUES (1, '{$catName}', $position)";
        $r = mysqli_query($dbc, $q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
        if(mysqli_affected_rows($dbc) == 1) {
            $messages = "<p class='success'>The category was added successfully.</p>";
        } else {
            $messages = "<p class='warning'>Could not add to the database due to a system error.</p>";
        }
    } else {
        $messages = "<p class='warning'>Please fill all the required fields</p>";
    }
} // END main IF submit condition
?>



<div id="content">
    <h2>Create a category</h2>
    <?php  if(!empty($messages)) echo $messages;?>
    <form id="add_cat" action="" method="post">
        <fieldset>
            <legend>Add category</legend>
            <div>
                <label for="category">Category Name: <span class="required">*</span>
                    <?php
                    if(isset($errors) && in_array('category', $errors)){
                        echo "<p class = 'warning'>Please fill in the category name</p>";
                    }
                    ?>
                </label>
                <input type="text" name="category" id="category" value="<?php if(isset($_POST['category'])) echo strip_tags($_POST['category']); ?>" size="20" maxlength="111 tabidex"1"/>
            </div>
            <div>
                <label for="position">Position: <span class="required">*</span>
                    <?php
                    if(isset($errors) && in_array('position', $errors)){
                        echo "<p class = 'warning'>Please pick a position</p>";
                    }
                    ?>
                </label>
                <select name="position" tabindex="2" >
                    <?php
                    $q = "SELECT count(cat_id) AS count FROM categories";
                    $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                    if(mysqli_num_rows($r) == 1) {
                        list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                        for($i=1; $i<=$num+1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                            echo "<option value='{$i}'";
                            // selected nhớ form giúp người dùng tiệ hơn`
                            if(isset($_POST['position']) && $_POST['position'] == $i) echo "selected='selected'";
                            echo ">".$i."</otption>";
                        }
                    }
                    ?>
                </select>
            </div>
        </fieldset>
        <p><input type="submit" name="submit" value="Add Category"></p>
    </form>


</div>

<?php include('../fontend/Sidebar-b.php');?>
<?php include('../fontend/Footer.php');?>
