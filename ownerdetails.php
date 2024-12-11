<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function goBack() {window.history.back();} // To go back to the same page
    </script>
</head>
<body>
<header>
    <h1>Owner Details</h1>
    <button class="back-button" onclick="goBack()">Back</button>
</header>
<main>    
<?php
// Includes the Database configuration file
require_once('Database.php');

//New database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the owner ID from the URL parameter
    $ownerId = $_GET['id'];

    //SQL query to fetch information about the specific owner
    $ownerDetailQuery = "SELECT 
        id,  
        name,
        address,
        email,
        phone
        FROM owners
        WHERE 
        id = $ownerId";

    // Query to fetch information about the specific owner
    $resultOwnerDetail = $conn->query($ownerDetailQuery);

    if ($resultOwnerDetail->num_rows > 0) {
        // Fetch the details of the specific owner
        $rowOwnerDetail = $resultOwnerDetail->fetch_assoc();

        // Display the details of the specific owner
        echo "<h1>Owner Details</h1>";
        echo "<p><strong>Owner ID:</strong> {$rowOwnerDetail['id']}</p>";
        echo "<p><strong>Name:</strong> {$rowOwnerDetail['name']}</p>";
        echo "<p><strong>Address:</strong> {$rowOwnerDetail['address']}</p>";
        echo "<p><strong>Email:</strong> <a href='mailto:{$rowOwnerDetail['email']}'>{$rowOwnerDetail['email']}</a></p>";
        echo "<p><strong>Phone:</strong> {$rowOwnerDetail['phone']}</p>";
    } else {
        // Display a message if the owner with the specified ID is not found
        echo "<p>Owner not found.</p>";
    }
} else {
    // Display a message if the 'id' parameter is not set in the URL
    echo "<p>Owner ID not provided.</p>";
}

// Close the database connection
$conn->close();
?>
</main>
</body>
</html>
