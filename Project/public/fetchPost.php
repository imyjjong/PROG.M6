<?php
    $data = file_get_contents('php://input');
    //echo $data;
    $json = json_decode($data);
    echo "<section>";
    echo "<pre>";
    echo "<h2>";
    echo  $json->article;
    echo "</h2>";
    echo "<pre>";
    echo "<h2>";
    echo  $json->maxPrice;
    echo "</h2>";
    echo "<pre>";
    echo "</section>";
?>