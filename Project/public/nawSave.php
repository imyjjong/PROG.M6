<?php
    include_once '../source/database.php';
    $connection = database_connect();
    $data = file_get_contents('php://input');
    $json = json_decode($data);
    $sql = "SELECT COUNT(1) as count FROM naw WHERE email=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("s", $json->email);
    $statement->execute();
    $results = $statement->get_result();
    $count = mysqli_fetch_assoc($results);
    if($count["count"] > 0){
        echo json_encode([
            "success" => false,
            "count" => $count["count"],
            "error" => "dit emailadres wordt al gebruikt"
        ]);
        return false;
    }
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
    $insert_id = $stmt->insert_id;
    $response = ["succeeded" => $result, "id" => $insert_id];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>