<?php

$conn = new mysqli("127.0.0.1", "root", "", "corememories");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$default_islands_query = "SELECT * FROM islandsofpersonality WHERE status='active'";
$islands_result = $conn->query($default_islands_query);


$contents_query = "SELECT * FROM islandcontents";
$contents_result = $conn->query($contents_query);
$island_contents = [];
while ($content = $contents_result->fetch_assoc()) {
    $island_contents[$content['islandOfPersonalityID']][] = $content;
}
?>