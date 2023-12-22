<?php
    move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/temp.png");
    print_r($_FILES);
?>