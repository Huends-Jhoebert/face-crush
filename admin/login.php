<?php
include_once "../config/database.php";

if (isset($_POST["loginBtn"])) { //isset is used to check if a variable is present; in this case loginBtn is the name of the button in the login page;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["username"] = $row["admin_username"];
        $_SESSION["password"] = $row["admin_password"];
        $_SESSION["image"] = $row["admin_image"];
        header("location:dashboard/dashboard.php");
    } else
        header("location:admin.php");
}
