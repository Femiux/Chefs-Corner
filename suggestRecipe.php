<?php
// Start the session to access session variables
session_start();

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$dbName = "chefs_corner";
$conn = new mysqli($server, $username, $password, $dbName);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
 
    $recipe_name = $_POST['recipe_name'];
    $description = $_POST['description'];

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page or display an error message
        echo "<script>alert('Please login to add recipes')</script>";
        echo "<script>window.location.href = 'login.php'</script>";
        exit(); // Stop script execution
    }
    
    $user_id = $_SESSION['user_id'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO suggest (user_id, recipe_name, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $recipe_name, $description);

    // Execute the statement
    if ($stmt->execute()) {
        // Recipe added successfully
        echo "<script>alert('Suggestion Received Successfully')</script>";
        echo "<script>window.location.href='home.php';</script>";
    } else {
        // Handle error
        echo "<script>alert('Sorry, there was an error sending your suggestion.');</script>";
        echo "<script>window.history.back();</script>";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

} else {
    // If the form is not submitted
    echo "Invalid request.";
}
?>
