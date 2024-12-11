<html>
<body>
    <!-- Header containing the competition details and navigation -->
    <header>
    <h1>Competition Details</h1>
    <?php include('Navigation.php'); ?>
    </header>

<main>    
    <?php
    // Include the Database.php file for database connection parameters
    require_once('Database.php');
    
    // New mysqli connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // SQL query to retrieve competition details along with associated event details
    $Compquery = "
    SELECT
        competitions.id, 
        competitions.day, 
        competitions.amOrPm, 
        competitions.event_id, 
        events.description
    FROM 
        competitions
    JOIN
        events ON competitions.event_id = events.id; ";
    // Execute the query and store the result
    $resultComp = $conn->query($Compquery);
    ?>
    <!-- Center-aligned table to display competition details -->
    <center>
        <table>
            <tr>
                <th>Competition ID</th>
                <th>Competition Day</th>
                <th>AmOrPM</th>
                <th>Event ID</th>
                <th>Event Name</th>
            </tr>
            
            <?php
            // Loop through the result set and display competition details in table rows
            while ($rowComp = $resultComp->fetch_assoc()) {
                echo "<tr>
                    <td>{$rowComp['id']}</td>
                    <td>{$rowComp['day']}</td>
                    <td>{$rowComp['amOrPm']}</td>
                    <td>{$rowComp['event_id']}</td>
                    <td>{$rowComp['description']}</td>
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
