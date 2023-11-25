<?php
require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';

$connection = database_connect();
$amsterdam = 'amsterdam';
$haarlem = 'haarlem';
$almere = 'almere';
$sql = 'SELECT * FROM weersomstandighedenPerDag WHERE plaats=? OR plaats=? OR plaats=? ORDER BY datum';
$stmt = $connection->prepare($sql);
$stmt->bind_param('sss', $amsterdam, $haarlem, $almere);
$stmt->execute();
$result = $stmt->get_result();
$weersomstandigheden = mysqli_fetch_all($result);
var_dump($weersomstandigheden);