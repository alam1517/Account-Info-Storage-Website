<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <img src="images/login-logo.png"/>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text"     class="input-field" name="username"  placeholder="Enter your username" required>
                <input type="password" class="input-field" name="password"  placeholder="Enter your password" required>
                <button type="submit"  class="login-btn">Login</button>
            </form>
            <form id="register" class="input-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input  type="text"     class="input-field" name="email"    placeholder="Enter your email"    required>
                <input  type="text"     class="input-field" name="username" placeholder="Enter your username" required>
                <input  type="password" class="input-field" name="password" placeholder="Enter your password" required>
                <button type="submit"   class="register-btn">Register</button>
            </form>
        </div>
    </div>
    
    <!-- toggle buttons (Login and Register) script -->
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function login() {
            x.style.left = "0px";
            y.style.left = "500px";
            z.style.left = "0";
        }

        function register() {
            x.style.left = "-500px";
            y.style.left = "0px";
            z.style.left = "110px";
        }
    </script>
</body>
</html>