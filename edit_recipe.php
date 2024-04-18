<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $editRecipeData
$editRecipeData = [];

// Check if recipe ID is provided and valid
if (isset($_GET['recipe_id']) && is_numeric($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    // Fetch recipe data
    $query = "SELECT * FROM recipetab WHERE recipe_id = $recipe_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $editRecipeData = mysqli_fetch_assoc($result);
    } else {
        // Handle the case where recipe data is not found
        $error_message = "Recipe not found.";
    }
}

// Update recipe information if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_recipe'])) {

    // Get image details
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Check if file is an image
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file_type, $allowed_types)) {
        $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
    } else {
        // Move uploaded file to target directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Update recipe information in the database including the image filename
            $recipe_name = isset($_POST['recipe_name']) ? $_POST['recipe_name'] : '';
            $category = isset($_POST['category']) ? $_POST['category'] : '';
            $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
            $cuisine = isset($_POST['cuisine']) ? $_POST['cuisine'] : '';
            $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $steps = isset($_POST['steps']) ? $_POST['steps'] : '';

            $update_query = "UPDATE recipetab SET recipe_name = '$recipe_name', category = '$category', duration = '$duration', cuisine = '$cuisine', ingredients = '$ingredients', description = '$description', steps = '$steps', file_Name = '$file_name' WHERE recipe_id = $recipe_id";

            if (mysqli_query($conn, $update_query)) {
                // Redirect to recipe page
                header("Location: hq.php?recipe_id=$recipe_id");
                exit();
            } else {
                // Handle update error
                $error_message = "Failed to update recipe. Please try again.";
            }
        } else {
            $error_message = "Failed to upload image. Please try again.";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
