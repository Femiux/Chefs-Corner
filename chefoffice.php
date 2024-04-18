<?php
// Start the session
$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

// Check if the user is an admin
$is_admin = false;
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
    $is_admin = true;
}

// Query to fetch recipes uploaded by the chef or admin
if ($is_admin) {
    $query = "SELECT * FROM recipetab";
} else {
    $chef_id = $_SESSION['user_id'];
    $query = "SELECT * FROM recipetab WHERE chef_id = $chef_id";
}
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    if ($is_admin) {
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Category</th>';
        echo '<th>Duration</th>';
        echo '<th>Ingredients</th>';
        echo '<th>Location</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['recipe_id'] . '</td>';
            echo '<td>' . $row['recipe_name'] . '</td>';
            echo '<td>' . $row['category'] . '</td>';
            echo '<td>' . $row['duration'] . '</td>';
            echo '<td>' . $row['ingredients'] . '</td>';
            echo '<td>' . $row['cuisine'] . '</td>'; // Assuming cuisine is the location
            echo '<td><a href="edit_recipe.php?id=' . $row['recipe_id'] . '">Edit</a></td>'; // Replace edit_recipe.php with the appropriate URL
            echo '<td><a href="delete_recipe.php?id=' . $row['recipe_id'] . '">Delete</a></td>'; // Replace delete_recipe.php with the appropriate URL
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<div class="recipe-container">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="recipe-card">';
            echo '<img src="uploads/' . $row['file_Name'] . '" alt="' . $row['recipe_name'] . '">';
            echo '<h3>' . $row['recipe_name'] . '</h3>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            echo '<p>Duration: ' . $row['duration'] . '</p>';
            echo '<p>Location: ' . $row['cuisine'] . '</p>';
            echo '<div class="button-container">';
            echo '<a href="edit_recipe.php?id=' . $row['recipe_id'] . '" class="btn btn-primary">Edit</a>';
            echo '<a href="delete_recipe.php?id=' . $row['recipe_id'] . '" class="btn btn-danger">Delete</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
} else {
    echo 'No recipes found.';
}

mysqli_close($conn);
?>
