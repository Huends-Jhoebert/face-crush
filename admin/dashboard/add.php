<?php
$server = 'localhost'; //server name; xammpp default is localhost
$uname = 'root'; //mysql username; root is the default username
$pword = ''; //mysql password; blank is the default of xammpp
$dbname = 'face_crush_db'; //name of the DB to be used
$conn = new mysqli($server, $uname, $pword, $dbname); //this variable is the one that will connect to the database;

include_once "functions/randomString.php";

$name = '';
$course_yr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $course_yr = $_POST['course_yr'];


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

    if ($image && $image['tmp_name']) {
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));

        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    $sql = "INSERT INTO people (name, course_yr, image)
            VALUES ('$name', '$course_yr', '$imagePath')";

    $conn->query($sql);

    $conn->close();
    // $statement = $pdo->prepare("INSERT INTO users (user_username, user_password, user_image)
    //             VALUES(:username, :password, :image)");

    // $statement->bindValue(':username', $username);
    // $statement->bindValue(':password', $password);
    // $statement->bindValue(':image', $imagePath);
    // $statement->execute();
    header('Location: dashboard.php');
}
