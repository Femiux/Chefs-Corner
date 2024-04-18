<?php
// Start the session to access session variables
session_start();

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

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $maxFileSize = 10 * 1024 * 1024;
    $recipe_name = $_POST['recipe_name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $cuisine = $_POST['cuisine'];
    $ingredients = $_POST['ingredients'];
    $description = $_POST['description'];
    $steps = $_POST['steps'];

    // Define arrays mapping categories and cuisines to their respective IDs
    $category_ids = [
        'Breakfast' => '1',
        'Lunch' => '2',
        'Vegetarian' => '3',
        'Appetizers & Snacks' => '4',
        'Desserts' => '5',
        'Beverages' => '6',
    ];

    $cuisine_ids = [
        'European Cuisine' => '1',
        'African Cuisine' => '2',
        'Asian Cuisine' => '3',
        'Pakistan Cuisine' => '4',
        'Italian Cuisine' => '5',
        'Mexican Cuisine' => '6',
        'Australian Cuisine' => '6',
    ];

    // Assign category and cuisine IDs
    $category_id = $category_ids[$category] ?? null;
    $cuisine_id = $cuisine_ids[$cuisine] ?? null;

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page or display an error message
        echo "<script>alert('Please login to add recipes')</script>";
        echo "<script>window.location.href = 'login.php'</script>";
        exit(); // Stop script execution
    }
    
    // Fetch chef_id from session
    $chef_id = $_SESSION['user_id'];

    // File upload directory
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $imageType = exif_imagetype($_FILES["file"]["tmp_name"]);
    $allowedImageTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF];
    
    if (!in_array($imageType, $allowedImageTypes)) {
        echo "Sorry, only JPG, PNG, and GIF files are allowed to upload.";
    } elseif ($_FILES["file"]["size"] > $maxFileSize) {
        echo "Error: File size exceeds maximum allowed size.";
    } else {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert recipe details into database
            $query = "INSERT INTO recipetab (chef_id, recipe_name, category_id, category, duration, cuisine, cuisine_id, ingredients, steps, description, file_name) VALUES ('$chef_id', '$recipe_name', '$category_id', '$category', '$duration', '$cuisine', '$cuisine_id', '$ingredients', '$steps', '$description', '$fileName')";
            
            if (mysqli_query($conn, $query)) {
                // Recipe added successfully
                echo "<script>alert('Recipe added successfully')</script>";
                if ($_SESSION['role'] == 'admin') {
                    echo "<script>window.location.href='hq.php';</script>";
                } elseif ($_SESSION['role'] == 'chef') {
                    echo "<script>window.location.href='chefprofile.php';</script>";
                }
            } else {
                // Error occurred
                echo "<script>alert('Error adding recipe: " . mysqli_error($conn) . "') </script>";
                if ($_SESSION['role'] == 'admin') {
                    echo "<script>window.location.href='hq.php';</script>";
                } elseif ($_SESSION['role'] == 'chef') {
                    echo "<script>window.location.href='chefprofile.php';</script>";
                }
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            echo "<script>window.history.back();</script>";
        }
    }
} else {
    // If the form is not submitted
    echo "Invalid request.";
}
?>
