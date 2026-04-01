<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style/profile.css">
</head>
<body>
    <div class="profile">
        <h2>Welcome, <?=htmlspecialchars(($user['name']))?></h2>
        <p><strong>Email: </strong><?= htmlspecialchars(($user['email']))?></p>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
</body>
</html>