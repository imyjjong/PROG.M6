<?php

    function handleFile($file, $link){
        $location = $file["tmp_name"];
        $ext = ".png";
        $filename = "../uploads/$link$ext";
        move_uploaded_file($location, $filename);
        insertImageInDb($file["name"], $file["type"], $file["size"], $filename, $link);
    };
    
    function createLink($fileid){
        $link = $_SERVER['HTTP_HOST']."/imagedownload.php?link=$fileid";
        return $link;
    };

    function insertImageInDb($name, $type, $size, $filename, $link){
        include_once "../source/database.php";
        global $file;
        $connection = database_connect();
        $q = "INSERT INTO imagetable (name, path, type, tmp_name, error, size) VALUES (?,?,?,?,?,?);";
        $stmt = $connection->prepare($q);
        $stmt->bind_param("ssssii", 
            $name, 
            $filename, 
            $type, 
            $file["tmp_name"], 
            $file["error"], 
            $size
        );
        $result = $stmt->execute();
    };

    $response = [
        "succeeded" => false,
        "message" => "yes",
        "downloadlink" => null
    ];
    
    $file = $_FILES["image"];
    if($file["error"] == 0){
        $link = uniqid();
        $response["succeeded"] = handleFile($file, $link);
        $response["downloadLink"] = createLink($link);
    }
    else{
        $response["message"] = "error during upload ". $file["error"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>