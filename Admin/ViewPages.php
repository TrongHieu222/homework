<?php include('../fontend/Header.php'); ?>
<?php include('../Fontend/ConnectSql.php'); ?>
<?php include('../Fontend/Function.php'); ?>
<?php include('SidebarAdmin.php'); ?>

<div id="content">
    <h2>Manage Pages</h2>
    <table>
        <thead>
        <tr>
            <th><a href="ViewPages.php?sort=pg">Pages</a></th>
            <th><a href="ViewPages.php?sort=on">Posted on</th>
            <th><a href="ViewPages.php?sort=by">Posted by</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Sap xep theo thu tu cua table head
        if (isset($_GET['sort'])) {
            switch ($_GET['sort']) {
                case 'pg':
                    $orderBy = 'page_name';
                    break;

                case 'on':
                    $orderBy = 'date';
                    break;

                case 'by':
                    $orderBy = 'name';
                    break;

                default:
                    $orderBy = 'date';
                    break;
            } // End Switch
        } else {
            $orderBy = 'date';
        }
        // truy xuat csdl de hien thi categories
        $q = "SELECT p.page_id, p.page_name, DATE_FORMAT(p.post_on, '%b %d %Y') AS date,CONCAT_WS(' ', first_name, last_name) AS name, p.content";
        $q .= " FROM pages AS p ";
        $q .= " JOIN users AS u ";
        $q .= " USING(user_id) ";
        $q .= " ORDER BY {$orderBy} ASC";
        $r = mySqliQuery($dbc, $q);
        confirmQuery($r, $q);
        if (mysqli_num_rows($r) > 0) {
            // Neu co page de hien thi, thi lay page va hien thi ra trinh duyet
            while ($aPages = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo "
            <tr>
                <td>{$aPages['page_name']}</td>
                <td>{$aPages['date']}</td>
                <td>{$aPages['name']}</td>
                <td>" . the_excerpt($aPages['content']) . "</td>
                <td><a class='edit' href='EditPages.php?pid={$aPages['page_id']}'>Edit</a></td>
                <td><a class='delete' href='DeletePages.php?pid={$aPages['page_id']}&pn={$aPages['page_name']}'>Delete</a></td>
            </tr>
            
            ";
            } // End while loop
        } else {
            // Neu khong co page de hien thi, bao loi hoac noi nguoi dung tao page
            $messages = "<p class='warning'>There is currently no page to display. Please create a page first.</p>";
        }
        ?>

        </tbody>
    </table>
</div><!--end content-->

<?php include('../fontend/Footer.php'); ?>