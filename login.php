<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="login_action.php">
            <input type="email" name="email" placeholder="Enter your email-id " required>
            <input type="password" name="password" placeholder="Enter your password " required>
            <button type="submit" value="Login">Submit</button>
        </form>
        <p>Don't have an Account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>