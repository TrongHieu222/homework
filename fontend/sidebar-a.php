<div class="content-container">
    <div class="section-navigation">
        <ul class="navi">
            <?php
            $q = "SELECT cat_name, cat_id FROM categories ORDER BY position ASC";
            $r = mysqli_query($dbc, $q) ;
            confirmQuery($r, $q);

            // Lay categories tu csdl
            while ($cats = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo "<li><a href='Index.php'>" . $cats['cat_name'] . "</a>";
                //Cau lenh truy xuat pages
                $q1 = "SELECT page_name, page_id FORM pages WHERE cat_id={$cats['cat_id']} ORDER BY position ASC";
                $r1 = mysqli_query($dbc, $q1) ;
                confirmQuery($r,$q);
//            echo "<li><a href=' '>".$pages['page_name'] . "</a></li>";{
                echo "<ul class ='pages'>";

                //lay pages tu CSDL
                while ($pages = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                    echo "<li><a href=''>".$pages['page_name']."</a></li>";
//                    if ($pages['page_id'] == $pid) echo "class='selected'";
//                    echo ">" . $pages['page_name'] . "</a></li>";


                    //            echo ">".$cats['cat_name']. "</a>";
                } // end while page
                echo "</ul>";
                echo "</li>";
            } // end while cat
            ?>

        </ul>
    </div>
</div>