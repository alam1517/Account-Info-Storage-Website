<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="images/login-logo.png"/>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-input">
                <input type="text" name="username" required="required" placeholder="Enter your username">
            </div>
            <div class="form-input">
                <input type="password" name="password"  required="required" placeholder="Enter your password">
            </div>
            <input type="submit" class="btn-login" value="Login">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>
</html>