<html>
<body>
<header>
    <h1>Owners</h1>
    <?php include('Navigation.php'); ?>
</header>
<main>
    <?php
    // Include the Database configuration file
    require_once('Database.php');

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Write a SQL query to fetch information about the Owners
    $ownerQuery = "SELECT 
        id,  
        name,
        address,
        email,
        phone
        FROM 
        owners ";

    // Execute the SQL query to fetch information about the Owners
    $resultOwner = $conn->query($ownerQuery);
    ?>

    <center>
        <!-- Display a table for presenting owner details -->
        <table>
            <tr>
                <th>Owner ID</th>
                <th>Owner Name</th>
                <th>Owner Address</th>
                <th>Owner Email</th>
                <th>Owner Phone</th>
            </tr>

            <?php
            // Loop through the result set and display each owner's information
            while ($rowOwner = $resultOwner->fetch_assoc()) {
                echo "<tr>
                <td>{$rowOwner['id']}</td>
                <td><a href='ownerdetails.php?id={$rowOwner['id']}'>{$rowOwner['name']}</a></td>
                <td>{$rowOwner['address']}</td>
                <!-- Link to send an email to the owner's email address -->
                <td><a href='mailto:{$rowOwner['email']}'>{$rowOwner['email']}</a></td>
                <td>{$rowOwner['phone']}</td>
                </tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </center>
</main>    
</body>
</html>
