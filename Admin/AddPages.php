<?php include('../fontend/Header.php');?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('../Fontend/Function.php'); ?>
<?php include('SidebarAdmin.php');?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Gia tri tri ton tai, xu ly form.
    $aErrors = array();
    if(empty($_POST['page_name'])) {
        $aErrors[] = 'page_name';
    } else {
        $pageName = mysqli_real_escape_string($dbc,strip_tags($_POST['page_name']));
    }

    if(isset($_POST['category']) && filter_var($_POST['category'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $catId= $_POST['category'];
    } else {
        $aErrors[] = "category";
    }

    if(isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $position = $_POST['position'];
    } else {
        $aErrors[] = "position";
    }

    if(empty($_POST['content'])) {
        $aErrors[] = 'content';
    } else {
        $content = mysqli_real_escape_string($dbc,$_POST['content']);
    }

    if(empty($errors)) {
        // Neu khong co loi xay ra, bat dau chen du lieu vao CSDL
        $q = "INSERT INTO pages (user_id, cat_id, page_name, content, position, post_on) 
                        VALUES (1, {$catId}, '{$pageName}', '{$content}', $position, NOW())";
        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
        if(mysqli_affected_rows($dbc) == 1) {
            $messages = "<p class='success'>The page was added successfully.</p>";
        } else {
            $messages = "<p class='warning'>The page could not be added due to a system error</p>";
        }
    } else {
        $messages = "<p class='warning'>Please fill in all the required fields</p>";
    }
}
?>
<div id="content">
    <h2>Create a page</h2>
    <form action="" method="post" id="login">
        <div>
            <label for="">Add a page</label>
                <div>
                    <label for="page"> Page Name: <span class="required">*</span>
                        <?php
                        if(isset($errors) && in_array('page_name', $errors)){
                            echo "<p class = 'warning'>Please fill in the page name</p>";
                        }
                        ?>
                    </label>
                    <input type="text" name="page_name" id="page_name" value="" size="20" maxlength="80" tabindex="1">
                </div>
                <div>
                    <label for="category">All categories: <span class="reqiured">*</span>
                        <?php
                        if(isset($errors) && in_array('category', $errors)){
                            echo "<p class = 'warning'>Please pick category</p>";
                        }
                        ?>
                    </label>
                    <select name="category" id="">
                        <option value="">Select Category</option>
                        <?php
                        $q = "SELECT cat_id, cat_name FROM categories ORDER BY position ASC";
                        $r = mysqli_query($dbc, $q);
                        if(mysqli_num_rows($r) > 0) {
                            while($cats = mysqli_fetch_array($r, MYSQLI_NUM)) {
                                echo "<option value='{$cats[0]}'";
                                if(isset($_POST['category']) && ($_POST['category'] == $cats[0])) echo "selected='selected'";
                                echo ">".$cats[1]."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="position">Positon: <span class="required">*</span>
                        <?php
                        if(isset($errors) && in_array('position', $errors)){
                            echo "<p class = 'warning'>Please pick a position</p>";
                        }
                        ?>
                    </label>
                    <select name="position" id="">
                        <?php
                        $q = "SELECT count(page_id) AS count FROM pages";
                        $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
                        if(mysqli_num_rows($r) == 1) {
                            list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                            for($i=1; $i<=$num+1; $i++) { // Tao vong for de ra option, cong them 1 gia tri cho position
                                echo "<option value='{$i}'";
                                // selected nhớ form giúp người dùng tiện hơn`
                                if(isset($_POST['position']) && $_POST['position'] == $i) echo "selected='selected'";
                                echo ">".$i."</otption>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="page-content">Page Content : <span class="required">*</span>
                        <?php
                        if(isset($errors) && in_array('content', $errors)){
                            echo "<p class = 'warning'>Please fill in the content</p>";
                        }
                        ?>
                    </label>
                    <textarea name="content" id="" cols="50" rows="2"></textarea>
                </div>
        </div>
        <p><input type="submit"  name="submit" value="Add page"></p>
    </form>

</div>
