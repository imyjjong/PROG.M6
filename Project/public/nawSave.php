<?php
    include_once '../source/database.php';
    $connection = database_connect();
    $data = file_get_contents('php://input');
    $json = json_decode($data);
    $q = "INSERT INTO naw (naam, straat, huisnummer, postcode, email) VALUES (?,?,?,?,?);";
    $stmt = $connection->prepare($q);
    $stmt->bind_param("ssiss",
        $json->name,
        $json->street,
        $json->huisnr,
        $json->postcode,
        $json->email
    );
    $result = $stmt->execute();
    $response = ["succeeded" => $result];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>