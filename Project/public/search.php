<?php
    require_once '../source/config.php';
    require_once SOURCE_ROOT . 'database.php';

    $connection = database_connect();
    $plaats = $_GET['search'];
    $sql = 'SELECT * FROM weersomstandighedenPerDag WHERE plaats=? ORDER BY datum';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $plaats);
    $stmt->execute();
    $result = $stmt->get_result();
    while($weersomstandigheid = mysqli_fetch_assoc($result)){
        $datum = $weersomstandigheid['datum'];
        $plek = $weersomstandigheid['plaats'];
        $graden = $weersomstandigheid['graden'];
        $windkracht = $weersomstandigheid['windkracht'];
        $regen = $weersomstandigheid['regenInMilimeters'];
        echo '<link rel="stylesheet" href="assets/css/style.css">';
        echo "<body>";
        echo "<pre>";
        echo "<p class='plaats'>".$plaats ." ". $datum . "</p>";
        echo "<p>Graden: ".$graden ."</p>";
        echo "<p>Windkracht: ".$windkracht ."</p>";
        echo "<p>Regen: ".$regen . "mm</p>";
        echo "</pre>";
        echo "</body>";
     }
?>