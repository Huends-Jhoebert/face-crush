<?php
include_once "database.php";

$id = $_GET["id"];

echo $id;

$sql = "DELETE FROM people WHERE id=$id";
$result = $conn->query($sql);


header("location:dashboard.php");
