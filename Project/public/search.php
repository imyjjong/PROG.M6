<?php
    require_once '../source/config.php';
    require_once SOURCE_ROOT . 'database.php';

    $connection = database_connect();
    $plaats = $_GET['search'].'%';
    $sql = 'SELECT * FROM weersomstandighedenPerDag WHERE plaats LIKE ? ORDER BY datum';
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
        echo '<form style="padding: 2rem 6rem;" action="search.html">';
        echo '<input class="search__submit" type="submit" value="ga terug">';
        echo "</form>";
        echo "</pre>";
        echo "</body>";
     }
?>