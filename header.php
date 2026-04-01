<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <img src="images/logoz.png" alt="logo"/>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="explore.php">Explore</a></li>
            <li>Contact Us</li>
            
            <?php if(isset($_SESSION['user'])):?>
            <li class="user-profile"><a href="profile.php" title="Profile"><div class="user-icon"><i class="fa-solid fa-user"></i></div><div class="user-name"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'user'); ?></div></a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>

        </ul>
    </div>
</body>
</html>