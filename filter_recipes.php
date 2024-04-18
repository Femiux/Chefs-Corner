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

// Retrieve filter parameters from POST request
$category = $_POST['category'];
$cuisine = $_POST['cuisine'];
$keyword = $_POST['keyword'];

// Prepare SQL query with filters
$sql = "SELECT * FROM recipetab WHERE 1=1";
if (!empty($category)) {
    $sql .= " AND category = '$category'";
}
if (!empty($cuisine)) {
    $sql .= " AND cuisine = '$cuisine'";
}
if (!empty($keyword)) {
    $sql .= " AND (recipe_name LIKE '%$keyword%' OR description LIKE '%$keyword%' OR ingredients LIKE '%$keyword%')";
}



// Execute SQL query
$result = $conn->query($sql);

// Display filtered recipes
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display each recipe as needed
        echo "<h2>" . $row['recipe_name'] . "</h2>";
        // Add more details as needed
    }
} else {
    echo "No recipes found.";
}

// Close database connection
$conn->close();
?>
