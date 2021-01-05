<?php include('../fontend/Header.php'); ?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('../Fontend/Function.php'); ?>
<?php include('SidebarAdmin.php'); ?>

<div id="content">
    <h2>Manage Categories</h2>
    <table>
        <thead>
        <tr>
            <th><a href="ViewCategories.php?sort=cat">Categories</a></th>
            <th><a href="ViewCategories.php?sort=pos">Position</th>
            <th><a href="ViewCategories.php?sort=by">Posted by</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Sap xep theo thu tu cua table head
        if (isset($_GET['sort'])) {
            switch ($_GET['sort']) {
                case 'cat':
                    $orderBy = 'cat_name';
                    break;

                case 'pos':
                    $orderBy = 'position';
                    break;

                case 'by':
                    $orderBy = 'name';
                    break;

                default:
                    $orderBy = 'position';
                    break;
            } // End Switch
        } else {
            $orderBy = 'position';
        }
        // truy xuat csdl de hien thi categories
        $q = "SELECT c.cat_id, c.cat_name, c.position, c.user_id, CONCAT_WS(' ', first_name, last_name) AS name";
        $q .= " FROM categories AS c ";
        $q .= " JOIN users AS u ";
        $q .= " USING(user_id) ";
        $q .= " ORDER BY {$orderBy} ASC";
        $r = mysqli_query($dbc, $q);
        confirm_query($r, $q);
        while ($aCats = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo "
            <tr>
                <td>{$aCats['cat_name']}</td>
                <td>{$aCats['position']}</td>
                <td>{$aCats['name']}</td>
                <td><a class='edit' href='EditCategory.php?cid={$aCats['cat_id']}'>Edit</a></td>
                <td><a class='delete' href='DeleteCategory.php?cid={$aCats['cat_id']}&cat_name={$aCats['cat_name']}'>Delete</a></td>
            </tr>
            
            ";
        }
        ?>

        </tbody>
    </table>
</div><!--end content-->

<?php //include('../fontend/Sidebar-b.php'); ?>
<?php include('../fontend/Footer.php'); ?>
