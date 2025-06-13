<?php
// Include the database connection file
include 'db.php';

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and trim the user input to prevent XSS and extra spaces
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $course = htmlspecialchars(trim($_POST['course']));
    $grade = htmlspecialchars(trim($_POST['grade']));

    // Prepare the SQL statement to insert data into the 'subscribers' table
    $sql = "INSERT INTO subscribers (name, email, course, grade) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Try to execute the query and handle any errors
    try {
        // Execute the prepared statement with user inputs
        $stmt->execute([$name, $email, $course, $grade]);

        // Redirect to view.php after successful insertion
        header("Location: view.php");
        exit();

    } catch (PDOException $e) {
        // Show an error message if something goes wrong with the database operation
        echo "Error inserting data: " . $e->getMessage();
    }
}
?>
