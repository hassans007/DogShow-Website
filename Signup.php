<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style2.css">   
</head>

<body>
    <center>
        <h1>Sign Up</h1>
        <form method='post' action='Signup.php'>
            First Name: <input type='text' name="fname" required /> <br>
            Last Name: <input type='text' name="lname" required /> <br>
            Date Of Birth: <input type='date' name="dob" required /> <br>
            User ID: <input type='text' name="uid" required /> <br>
            Password: <input type="password" name="pass" required /> <br>
            <input type="submit" value = "SignUp" name="submit" />
            <div class="signup-link">
            <p>Existing User? <a href='Login.php' style='color: red;'>Log In</a></p>
            </div>
        </form>

        <?php
        // Include the Database.php file that likely contains server credentials
        require_once('Database.php');

        // Create a new mysqli connection using server credentials
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['submit'])) {
            // Get the submitted username and password
            $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
            $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
            $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
            $userid = isset($_POST['uid']) ? $_POST['uid'] : '';
            $password = isset($_POST['pass']) ? $_POST['pass'] : '';
        
            // Check if the user ID already exists
            $checkQuery = "SELECT user_id FROM Users WHERE user_id = '$userid'";
            $checkResult = $conn->query($checkQuery);
        
            if ($checkResult->num_rows > 0) {
                echo "<div class='error-message'>User ID already exists. Please choose a different User ID.</div>";
            } else {
                // Use direct insertion into the SQL query (not recommended)
                $insertQuery = "INSERT INTO Users (user_id, user_password, user_fname, user_lname, DateOfBirth)
                                VALUES ('$userid', '$password', '$fname', '$lname', '$dob')";
                
                // Execute the query
                if ($conn->query($insertQuery)) {
                    echo "<div>Sign Up complete. <a href='Login.php' style='color: red;'>Log In</a></div>";
                } else {
                    echo "<div class='error-message'>There was an error!</div>";
                }
            }

        }
        // Close the connection
        $conn->close();
        ?>
    </center>
</body>

</html>
