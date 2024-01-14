<?php
    $id = $_GET["link"];
    $filename = '../uploads/'.$id.'.png';
    //echo $id;
    include_once '../source/database.php';
    $connection = database_connect();

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

    function findImage($connection,$filename){
        if($connection){
            try{
                $q = "SELECT * FROM imagetable WHERE path=?";
                $stmt = $connection->prepare($q);
                $stmt->bind_param("s", $filename);
                $stmt->execute();
                $result = $stmt->get_result();

                $searchResults = getQueryResultsAssoc($result);
                return ($searchResults);
            }
            catch(ex){
                echo "query error yk" . ex;
            }
        }
        return[];
    }
    
    $searchResults = findImage($connection,$filename);

    if(sizeof($searchResults) == 1){
        $filenamer = $searchResults[0]["path"];
        $filepointer = fopen($filenamer, 'rb');

        header("Content-Type: image/png");
        header("Content-Length: " . filesize($filenamer));
        fpassthru($filepointer);
        exit;
    }
    else{
        die("invalid file");
    }
?>