<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    echo "<script>alert('Please login to delete recipes')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
    exit(); // Stop script execution
}

$is_admin = false;
$is_chef = false;

// Check if the user is admin or chef
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $is_admin = true;
    } elseif ($_SESSION['role'] == 'chef') {
        $is_chef = true;
    }
}

// Check if the user has the authority to delete recipes
if (!$is_admin && !$is_chef) {
    // Redirect or display an error message indicating insufficient privileges
    echo "<script>alert('You do not have permission to delete recipes')</script>";
    echo "<script>window.location.href = 'home.php'</script>";
    exit(); // Stop script execution
}

// Check if the recipe ID is provided and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recipe_id = $_GET['id'];

    if ($is_admin) {
        $query = "DELETE FROM recipetab WHERE recipe_id = $recipe_id";
    } else { // Chef role
        // Ensure that the recipe belongs to the current chef
        $chef_id = $_SESSION['user_id'];
        $query = "DELETE FROM recipetab WHERE recipe_id = $recipe_id AND chef_id = $chef_id";
    }

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Deletion successful
        echo "<script>alert('Recipe deleted successfully')</script>";
        $redirectUrl = $is_admin ? 'hq.php' : 'chefprofile.php';
    } else {
        // Error occurred
        echo "<script>alert('Error deleting recipe: " . mysqli_error($conn) . "') </script>";
        $redirectUrl = $is_admin ? 'hq.php' : 'chefprofile.php';
    }
} else {
    // Recipe ID not provided or invalid
    echo "<script>alert('Invalid request')</script>";
    $redirectUrl = $is_admin ? 'hq.php' : 'chefprofile.php';
}

mysqli_close($conn);
echo "<script>window.location.href = '$redirectUrl'</script>";
?>
