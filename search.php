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


if (isset($_GET['q']) && !empty($_GET['q'])) {
    $searchTerm = $_GET['q'];
    
    $stmt = $conn->prepare("SELECT * FROM recipetab WHERE recipe_name LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%')  ORDER BY updated_date DESC");
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 col-sm-6 mb-4">';
            echo '<a href="#" class="recipe-card-link" data-toggle="modal" data-target="#recipeModal" onclick="showRecipeDetails(' . $row['recipe_id'] . ')">';
            echo '<div class="recipe-card" style="width: 25rem;" data-recipe-id="' . $row['recipe_id'] . '">';
            echo '<img class="recipe-image" src="uploads/' . $row['file_Name'] . '" alt="' . $row['recipe_name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['recipe_name'] . '</h5>';
            echo '<p class="card-text">Category: ' . $row['category'] . '</p>';
            echo '<p class="card-text">Location: ' . $row['cuisine'] . '</p>';
            echo '<a href="#" class="card-link">See more</a>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    } else {

        echo '<p>No recipes found matching your search criteria.</p>';
    }
    $stmt->close();
} else {
    echo '<p>Please enter a search term.</p>';
}
$conn->close();
?>
