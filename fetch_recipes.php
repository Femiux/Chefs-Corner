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

// Get selected category and cuisine from POST request
$category = $_POST['category'];
$cuisine = $_POST['cuisine'];

// Query to fetch recipes based on selected category and cuisine
$sql = "SELECT * FROM recipetab WHERE category = '$category' AND cuisine = '$cuisine'";
$result = mysqli_query($conn, $sql);

// Check if any recipes are found
if (mysqli_num_rows($result) > 0) {
    // Output HTML content of fetched recipes
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="recipe">';
        echo '<h3>' . $row['recipe_name'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        // Add more fields as needed
        echo '</div>';
    }
} else {
    // No recipes found
    echo 'No recipes found for the selected category and cuisine.';
}

// Close database connection
$conn->close();
?>
