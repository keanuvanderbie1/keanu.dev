<?php
// Initialize session
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    echo "You are already logged in as " . $_SESSION["username"];
    // You can provide a logout link here
    exit();
}

// Check if the registration form is submitted
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate and sanitize input (you should do more than this in a real application)
    $username = htmlspecialchars($username);
    // Hash the password (for security, use password_hash() in production)
    $hashed_password = md5($password);

    // Store user information in a database (not shown in this example)

    echo "Registration successful!";
} elseif (isset($_POST["login"])) { // Check if the login form is submitted
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user information from a database (not shown in this example)
    
    // For security, compare the hashed password (use password_verify() in production)
    if ($hashed_password_from_database == md5($password)) {
        // Store the username in a session to indicate that the user is logged in
        $_SESSION["username"] = $username;
        echo "Login successful!";
    } else {
        echo "Login failed. Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="register" value="Register">
    </form>

    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
