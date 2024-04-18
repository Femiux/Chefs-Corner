
<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    
    $recipe_id = $_POST['recipe_id'];
    $recipe_name = $_POST['recipe_name'];
    $cuisine = $_POST['cuisine'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    // Update query
    $query = "UPDATE recipetab SET recipe_name = ?, cuisine = ?, category = ?, duration = ?, description = ? WHERE recipe_id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);
    
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssssi", $recipe_name, $cuisine, $category, $duration, $description, $recipe_id);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to the main page with success message
        header("Location: hq.php?message=success");
        exit();
    } else {
        // Redirect to the main page with error message
        header("Location: home.php?message=error");
        exit();
    }
}

// Close database connection
mysqli_close($conn);
?>