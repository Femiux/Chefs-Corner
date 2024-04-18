<?php
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

// Check if recipe ID and rating are provided
if (isset($_POST['recipe_id']) && isset($_POST['rating'])) {
    $recipeId = $_POST['recipe_id'];
    $rating = $_POST['rating'];
    
    // Insert rating into database
    $stmt = $conn->prepare("INSERT INTO ratings (recipe_id, user_id, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $recipeId, $userId, $rating); // Assuming $userId is the ID of the logged-in user
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Recipe ID or rating not provided.']);
}
?>
