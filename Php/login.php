<?php
session_start();
require_once "connect.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$sql = "SELECT * FROM `users` WHERE email = '" . $email . "' AND password = '" . $password . "'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION["UserID"] = $row[0];
    header("Location: ../Pages/Index.html");
    exit;
} else {
    echo "THIS SHOULD BE TECHINCALLY INACCESSIBLE";
    echo "User not found";
}
