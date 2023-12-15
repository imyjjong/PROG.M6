<?php
    include_once("../source/database.php");

    $searchInput = $_GET['searchPersoon'];
    $connection = database_connect();
    $searchResults = findPerson($connection, $searchInput);
    $connection->close();

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($searchResults);

    function getQueryResultsAssoc($result){
        $results = [];
        if($result){
            for($i = 0; $i < $result->num_rows; $i++){
                $row = $result->fetch_assoc();
                array_push($results, $row);
            }
        }
        return $results;
    }

    function findPerson($connection, $name){
        if($connection){
            try{
                $q = "SELECT * FROM naw WHERE naam=?";
                $stmt = $connection->prepare($q);
                $stmt->bind_param("s", $name);
                $stmt->execute();
                $result = $stmt->get_result();

                $searchResults = getQueryResultsAssoc($result);
                echo '<link rel="stylesheet" href="assets/css/style.css">';
                echo "<body>";
                var_dump($searchResults);
                echo "</body>";
            }
            catch(ex){
                echo "query error yk" . ex;
            }
        }
        return[];
    }
?>