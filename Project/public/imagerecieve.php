<?php
    print_r($_FILES);

    function handleFile($file){
    };
    $response = ["succeeded" => false, "message" => ""];
    
    $file = $_FILES["image"];
    if($file["error"] == 0){
        $response["succeeded"] = handleFile($file);
    }
    else{
        $response["message"] = "error during upload ". $file["error"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);

    $link = uniqid();
    $location = $file["tmp_name"];
    $ext = ".png";
    $filename = "../uploads/$link$ext";
    move_uploaded_file($location, $filename);
?>