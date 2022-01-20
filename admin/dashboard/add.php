<?php
$server = 'localhost'; //server name; xammpp default is localhost
$uname = 'root'; //mysql username; root is the default username
$pword = ''; //mysql password; blank is the default of xammpp
$dbname = 'face_crush_db'; //name of the DB to be used
$conn = new mysqli($server, $uname, $pword, $dbname); //this variable is the one that will connect to the database;

include_once "functions/randomString.php";

$name = '';
$course_yr = '';
$description = '';
$type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $course_yr = $_POST['course_yr'];
    $description = $_POST['description'];
    $type = $_POST["type"];
    $rating = 1500;

    // if (!$username) {
    //     $errors[] = 'Username is required';
    // }
    // if (!$password) {
    //     $errors[] = 'Password is required';
    // }

    if (!is_dir('images')) {
        mkdir('images');
    }



    $image = $_FILES['image'] ?? null;
    $imagePath = '';


    if ($type == 'boy') {

        if ($image && $image['tmp_name']) {
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $sql = "INSERT INTO people (name, course_yr, image, description, rating)
            VALUES ('$name', '$course_yr', '$imagePath', '$description', '$rating')";

        $conn->query($sql);

        $conn->close();
        header('Location: dashboard.php');
    } else {
        if ($image && $image['tmp_name']) {
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $sql = "INSERT INTO people1 (name, course_yr, image, description, rating, type)
            VALUES ('$name', '$course_yr', '$imagePath', '$description', '$rating', '$type')";

        $conn->query($sql);

        $conn->close();
        header('Location: dashboard.php');
    }
}
