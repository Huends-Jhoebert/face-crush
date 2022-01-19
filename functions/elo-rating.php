<?php



// Ra and Rb are current ELO ratings
// $Ra = 1200;
// $Rb = 1000;

// $K = 30;
// $d = false;

$newRating = [];


//  Function to calculate the Probability
function probability($rating1, $rating2)
{
    return 1.0 * 1.0 / (1 + 1.0 * pow(10, 1.0 * ($rating1 - $rating2) / 400));
}

// Function to calculate Elo rating
// K is a constant.
// d determines whether Player A wins or Player B.
function EloRating($Ra, $Rb, $K, $d, $id1, $id2)
{
    include_once "./config/database.php";
    $sql1 = "";
    $sql2 = "";

    // To calculate the Winning
    // Probability of Player B
    $Pb = probability($Ra, $Rb);

    // To calculate the Winning
    // Probability of Player A
    $Pa = probability($Rb, $Ra);

    // Case -1 When Player A wins
    // Updating the Elo Ratings
    if ($d == 1) {
        $Ra = $Ra + $K * (1 - $Pa);
        $Rb = $Rb + $K * (0 - $Pb);

        $newRating[] = $Ra;
        $newRating[] = $Rb;
        $sql1 = "UPDATE people SET rating='$newRating[0]' WHERE id='$id1'";
        $sql2 = "UPDATE people SET rating='$newRating[1]' WHERE id='$id2'";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
    }

    // Case -2 When Player B wins
    // Updating the Elo Ratings
    else {
        $Ra = $Ra + $K * (0 - $Pa);
        $Rb = $Rb + $K * (1 - $Pb);

        $newRating[] = $Ra;
        $newRating[] = $Rb;
        $sql1 = "UPDATE people SET rating='$newRating[0]' WHERE id='$id1'";
        $sql2 = "UPDATE people SET rating='$newRating[1]' WHERE id='$id2'";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
    }

    header("location:./index.php");
}
