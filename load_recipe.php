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

// Check if the recipe ID is provided via POST request
if (isset($_POST['recipeId'])) {
    $recipeId = $_POST['recipeId'];

    // Fetch recipe details
    $stmt = $conn->prepare("SELECT * FROM recipetab WHERE recipe_id = ?");
    $stmt->bind_param("i", $recipeId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        //adding rating
        echo '<div class="rating-container">';
        echo '<div class="rating-stars">';
        echo '<span class="star" data-value="1">&#9733;</span>';
        echo '<span class="star" data-value="2">&#9733;</span>';
        echo '<span class="star" data-value="3">&#9733;</span>';
        echo '<span class="star" data-value="4">&#9733;</span>';
        echo '<span class="star" data-value="5">&#9733;</span>';
        echo '</div>';
        echo '</div>';

        // Output recipe details in HTML format
        echo '<h1>' . $row['recipe_name'] . '</h1>';
        echo '<img src="uploads/' . $row['file_Name'] . '" alt="' . $row['recipe_name'] . '">';
        echo '<p>Category: ' . $row['category'] . '</p>';
        echo '<p>Location: ' . $row['cuisine'] . '</p>';
        echo '<p>Duration: ' . $row['duration'] . '</p>';
        echo '<p>Description: ' . $row['description'] . '</p>';
        echo '<p>Ingredients: ' . $row['ingredients'] . '</p>';
        echo '<p>Steps: ' . $row['steps'] . '</p>';


        
    } else {
        echo 'Recipe not found.';
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If recipe ID is not provided, return an error message
    echo 'Recipe ID not provided.';
}
?>
