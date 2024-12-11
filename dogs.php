<html>
<body>
    <header>
        <h1>Dogs Details</h1>
        <?php include('Navigation.php'); ?>
    </header>
<main>
<?php
require_once('Database.php');
$conn = new mysqli($servername, $username, $password, $dbname);
// Write a SQL query to fetch information about the Owners
$dogsquery = "
    SELECT
        dogs.id, 
        dogs.name, 
        dogs.owner_id AS owner_id, 
        breeds.name AS breed_name
    FROM
        dogs
    JOIN 
        breeds ON dogs.breed_id = breeds.id
    ORDER BY 
        dogs.id;";
// Execute the SQL query to fetch information about the Owners
$resultdogs = $conn->query($dogsquery);
?>

<center>
    <table>
        <tr>
            <th>Dog ID</th>
            <th>Dog Name</th>
            <th>Owner ID</th>
            <th>Breed Name</th>
        </tr>
    <?php
    while ($rowdogs = $resultdogs->fetch_assoc()) {
        echo "<tr>
        <td>{$rowdogs['id']}</td>
        <td>{$rowdogs['name']}</td>
        <!--<td>{$rowdogs['owner_id']}</td>--!>
        <!-- Link to owners.php-->
        <td><a href='owners.php?owner_id={$rowdogs['owner_id']}'>{$rowdogs['owner_id']}</a></td>
        <td>{$rowdogs['breed_name']}</td>
        </tr>";
    }
    $conn->close();
    ?>
    </table>
</main>    
</center>

</body>
</html>
