<html>
<body>
    <header>
        <?php include('Navigation.php');?>
        <button class="logout-button" onclick="window.location.href='Login.php'">LogOut</button>
    </header>
    <main>
        <?php
        // Include the Database.php file 
        require_once('Database.php');
        // Create a new mysqli connection using server credentials
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Write query to fetch counts of owners, dogs, and events
        $queryOwners = "SELECT COUNT(*) AS owner_count FROM owners";
        $queryDogs = "SELECT COUNT(*) AS dog_count FROM dogs";
        $queryEvents = "SELECT COUNT(*) AS event_count FROM events";

        // Execute queries to fetch counts
        $resultOwners = $conn->query($queryOwners);
        $resultDogs = $conn->query($queryDogs);
        $resultEvents = $conn->query($queryEvents);

        // Check if queries were successful
        if (!$resultOwners || !$resultDogs || !$resultEvents) {
            die("Query failed: " . $conn->error);
        }

        // Fetch counts as associative arrays
        $rowOwners = $resultOwners->fetch_assoc();
        $rowDogs = $resultDogs->fetch_assoc();
        $rowEvents = $resultEvents->fetch_assoc();

        // Display the welcome message with counts
        echo "<div style='text-align: center;'>";
        echo "<h1>Welcome to Poppleton Dog Show!</h1>";
        echo "<p>This year {$rowOwners['owner_count']} owners and {$rowDogs['dog_count']} dogs entered in {$rowEvents['event_count']} events!</p>";
        echo "</div>";

        // SQL query to fetch information about the top ten dogs
        $queryTopTen = "
        SELECT
            d.id AS dog_id,
            d.name AS dog_name,
            b.name AS breed_name, 
            AVG(e.score) AS avg_score,
            COUNT(DISTINCT e.competition_id) AS event_count,
            o.id AS owner_id,
            o.name AS owner_name,
            o.email AS owner_email
        FROM
            entries e
        JOIN
            dogs d ON e.dog_id = d.id
        JOIN
            breeds b ON d.breed_id = b.id
        JOIN
            owners o ON d.owner_id = o.id
        GROUP BY
            d.id, d.name, d.breed_id, b.name, o.id, o.name, o.email
        HAVING
            event_count > 1
        ORDER BY
            avg_score DESC
        LIMIT 10; 
        ";
        // Execute the SQL query to fetch information about the top ten dogs
        $resultTopTen = $conn->query($queryTopTen);
        // Check if the query was successful
        if (!$resultTopTen) { die("Query failed: " . $conn->error);}
        ?>

        <center>
        <!-- Display the information in a table -->
        <table>
            <caption>Top Ten Dogs</caption>   
            <tr>
                <th>Dog ID</th>
                <th>Dog Name</th>
                <th>Breed Name</th>
                <th>Event Count</th>
                <th>Average Score</th>
                <th>Owner Name</th>
                <th>Owner Email</th>
            </tr>
            <?php
            // Loop through the result set and display each dog's information in a table row
            while ($rowTopTen = $resultTopTen->fetch_assoc()) {
                echo "<tr>
                        <td>{$rowTopTen['dog_id']}</td>
                        <td>{$rowTopTen['dog_name']}</td>
                        <td>{$rowTopTen['breed_name']}</td>
                        <td>{$rowTopTen['event_count']}</td>
                        <td>{$rowTopTen['avg_score']}</td>
                        <!-- Link to ownerdetails.php with the dynamic owner_id from the $rowTopTen array -->
                        <td><a href='ownerdetails.php?id={$rowTopTen['owner_id']}'>{$rowTopTen['owner_name']}</a></td>
                        <!--Link to send an email to the owner's email address-->
                        <td><a href='mailto:{$rowTopTen['owner_email']}'>{$rowTopTen['owner_email']}</a></td>
                      </tr>";}
            ?>
        </table>
        </center>
        <?php
        // Close the database connection
        $conn->close();
        ?>
    </main>
</body>
</html>
