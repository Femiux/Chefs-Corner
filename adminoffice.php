<?php
// Start the session
$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);


// Query to fetch all recipes with the username of the uploader
$query = "SELECT recipetab.*, users.username
          FROM recipetab
          INNER JOIN users ON recipetab.chef_id = users.user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['recipe_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>'; // This displays the username
        echo '<td>' . $row['recipe_name'] . '</td>';
        echo '<td><img src="uploads/' . $row['file_Name'] . '" alt="' . $row['recipe_name'] . '" style="width: 100px; height: auto;"></td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>' . $row['duration'] . '</td>';
        
        // Limiting the description to a certain length
        $maxDescriptionLength = 50; // Maximum length of the description
        $description = $row['description'];
        if (strlen($description) > $maxDescriptionLength) {
            $description = substr($description, 0, $maxDescriptionLength) . '...'; // Truncate if longer than the maximum length
        }
        echo '<td>' . $description . '</td>';
        
        echo '<td>' . $row['cuisine'] . '</td>';
        echo '<td>' . $row['updated_date'] . '</td>'; 
        echo '<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editRecipeModal" data-id="' . $row['recipe_id'] . '">Edit</a></td>';
        echo '<td><button type="button" class="btn btn-danger" onclick="deleteRecipe(' . $row['recipe_id'] . ')">Delete</button></td>';
        echo '</tr>';
        
    }
} else {
    echo '<tr><td colspan="9">No recipes found.</td></tr>';
}

mysqli_close($conn);
?>