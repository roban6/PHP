<?php
// Include the database connection file
include 'db.php';

try {
    // Run a query to get all records from the 'subscribers' table
    $stmt = $pdo->query("SELECT * FROM subscribers");
    
    // Fetch all records as an associative array
    $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Stop execution and display error message if something goes wrong
    die("Error fetching records: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subscribers List</title>
    
    <!-- Link to external CSS for styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Page heading -->
    <h2>All Subscribers</h2>

    <!-- Table to display subscriber records -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Grade</th>
        </tr>
        
        <!-- Loop through each subscriber record and display in table rows -->
        <?php foreach ($subscribers as $row): ?>
            <tr>
                <!-- Use htmlspecialchars to prevent XSS attacks -->
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['course']) ?></td>
                <td><?= htmlspecialchars($row['grade']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Link to go back to the add subscriber form -->
    <br>
    <a href="add.php">Add New Subscriber</a>

</body>
</html>
