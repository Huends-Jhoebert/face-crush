<?php
include_once "database.php";

$type = $_POST["type"];
$id = $_POST["id"];


if ($type == "boy") {
    $sql = "DELETE FROM people WHERE id=$id";
    $result = $conn->query($sql);
} else {
    $sql = "DELETE FROM people1 WHERE id=$id";
    $result = $conn->query($sql);
}




header("location:dashboard.php");
