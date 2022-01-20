<?php

include_once "functions/elo-rating1.php";

$rating1 = $_POST["rating1"];
$rating2 = $_POST["rating2"];
$d = $_POST["win"];
$user1Id = $_POST["id1"];
$user2Id = $_POST["id2"];
// $Ra = 1200;
// $Rb = 1000;

$K = 30;
// $d = false;

EloRating($rating1, $rating2, $K, $d, $user1Id, $user2Id);
