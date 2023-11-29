<?php
    $name = "";
    if(empty($_POST["name"])){
        echo '<b style="color:red;">no name</b>';
    }
    else{
        $name = $_POST["name"];
    }
    echo $name;
    echo "<br>";

    $street = "";
    if(empty($_POST["street"])){
        echo '<b style="color:red;">no street</b>';
    }
    else{
        $street = $_POST["street"];
    }
    echo $street;
    echo "<br>";

    $huisnr = "";
    if(empty($_POST["huisnr"])){
        echo '<b style="color:red;">no huisnummer</b>';
    }
    else{
        $huisnr = $_POST["huisnr"];
    }
    echo $huisnr;
    echo "<br>";

    $postcode = "";
    if(empty($_POST["postcode"])){
        echo '<b style="color:red;">no postcode</b>';
    }
    else{
        $postcode = $_POST["postcode"];
    }
    echo $postcode;
    echo "<br>";
    $email = "";
    if(empty($_POST["email"])){
        echo '<b style="color:red;">no email</b>';
    }
    else{
        $email = $_POST["email"];
    }
    echo $email;
    echo "<br>";

?>