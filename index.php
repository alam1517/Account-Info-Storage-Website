<?php
// Initalize the session
session_start();

// Check for already loggin in user. If yes, redirect to user's page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("location: user.php");
    exit;
}

// Include config.php
require_once "config.php";

// Initialized Variables
$username = $password = $email = "";
$username_err = $password_err = $email_err = $login_err = "";

// Process submitted form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store username
    $username = trim($_POST["username"]);

    // Store password
    $password = trim($_POST["password"]);

    // Store email
    $email = trim($_POST["email"]);

    // Login
    if (empty($email)) {
        // Prepare SQL select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables as parameters and set it
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            // Execute the statement
            if ($stmt->execute()) {
                $stmt->store_result();
                // Check if username exists. If yes, verify.
                if ($stmt->num_rows() == 1) {
                    $stmt->bind_result($id, $username, $acc_password);
                    if ($stmt->fetch()) {
                        // Verify password
                        if ($acc_password == $password) {
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = (int) $id;

                            header("location: user.php");
                        }
                        else {
                            $login_err = "Invalid password.";
                        }
                    }
                }
                else {
                    $login_err = "Invalid username.";
                }
            }
        }
    }
}
?>

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
        <div class="toast toast-visible">Sample toast message</div>
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

                <button type="submit"  class="login-btn" onclick="document.getElementById('register').value = ''">Login</button>
            </form>
            <form id="register" class="input-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input  type="text"     class="input-field" name="email"    placeholder="Enter your email"    required>
                <input  type="text"     class="input-field" name="username" placeholder="Enter your username" required>
                <input  type="password" class="input-field" name="password" placeholder="Enter your password" required>
                <button type="submit"   class="register-btn">Register</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>