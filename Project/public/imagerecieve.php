<?php
    print_r($_FILES);

    function handleFile($file){};
    
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

    include_once "../source/database.php";
    $connection = database_connect();
    $name = $file["name"];
    $path = $file["full_path"];
    $type = $file["type"];
    $error = $file["error"];
    $size = $file["size"];  
    
    $q = "INSERT INTO imagetable (name, path, type, tmp_name, error, size) VALUES (?,?,?,?,?,?);";
    $stmt = $connection->prepare($q);
    $stmt->bind_param("ssssii", $name, $path, $type, $location, $error, $size);
    $result = $stmt->execute();
    $responses = ["succeeded" => $result];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($responses);
?>