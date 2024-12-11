<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script>
        // Disable browser back button on the login page
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</head>

<body>
    <center>
        <h1>Log In</h1>
        <form method='post' action='Login.php'>
            Username <input type='text' name="uname" required /> <br>
            Password <input type='password' name="pass" required /> <br>
            <input type="submit" value = "Login" name="login" />
            <div class="signup-link">
            <p>New User? <a href='Signup.php' style='color: red;'>Sign Up</a></p>
            </div>
        </form>
        <div class="error-message">
            <?php
            session_start(); // Add session_start() at the beginning

            require_once('Database.php');

            if (isset($_POST['login'])) {
                // Get the submitted username and password
                $username = isset($_POST['uname']) ? $_POST['uname'] : '';
                $password = isset($_POST['pass']) ? $_POST['pass'] : '';

                // Write query to fetch data
                $query = "SELECT user_id, user_password FROM Users WHERE user_id='$username' AND user_password='$password'";

                // Execute query to fetch data from the table My_User
                $result = $conn->query($query);

                // Check if the query was successful
                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                // Check if a matching user was found
                if ($result->num_rows > 0) {
                    // Authentication successful, redirect to the main page or perform other actions
                    $_SESSION['username'] = $username; // Store username in session
                    header("Location: home.php"); // redirects them to homepage
                    exit; // for good measure
                } else {
                    // Authentication failed, display an error message
                    echo "Invalid username or password.";
                }
            }
            ?>
        </div>
    </center>
</body>

</html>
