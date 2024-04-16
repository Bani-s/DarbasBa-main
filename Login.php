<?php
session_start();

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are correct (replace these with your actual credentials)
    $username = "1";
    $password = "1";

    // Validate username and password
    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        // Authentication successful, set session variable
        $_SESSION["authenticated"] = true;
        // Redirect to admin panel
        header("Location: admin.php");
        exit;
    } else {
        // Authentication failed, display error message
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Admin Panel</h1>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="tierlist.php">Tier List</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Login - Admin Panel</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
    </div>
</body>
</html>
