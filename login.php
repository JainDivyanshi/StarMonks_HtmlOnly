<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="logo.png" class="logo"></a><br><br>
            <ul>
                <li><a href="website.html">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="whatnew.html">What's New</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </header>
        <br><br><br><br><br><hr><br><br>

        <div class="login-container">
            <?php
            include 'sqlconnect.php';

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get username and password from the form
                $username = $_POST['username'];
                $password = $_POST['password'];

                // SQL query to check if the credentials exist in the database
                $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = $conn->query($sql);

                // Check if the query returned any rows
                if ($result->num_rows > 0) {
                    // Redirect to the homepage if the credentials are correct
                    header("Location: website.html");
                    exit();
                } else {
                    // Display error message if credentials are incorrect
                    echo "<p>Incorrect username or password. Please try again.</p>";
                }
            }
            ?>
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </section>
</body>
</html>
