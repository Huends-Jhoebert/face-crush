<?php

include_once "functions/elo-rating.php";

$rating1 = $_POST["rating1"];
$rating2 = $_POST["rating2"];
$d = $_POST["win"];
// $Ra = 1200;
// $Rb = 1000;

$K = 30;
// $d = false;

EloRating($rating1, $rating2, $K, $d);
