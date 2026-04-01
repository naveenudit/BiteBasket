<?php include 'db.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="form-container">
        <h2>Create an Account</h2>
        <form method="POST" action="register_action.php">
            <input type="text" name="name" placeholder="Enter your full name " required>
            <input type="email" name="email" placeholder="Enter your email-id " required>
            <input type="password" name="password" placeholder="Enter your password " required>
            <button type="submit">Submit</button>
        </form>
        <p>Already have an Account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>