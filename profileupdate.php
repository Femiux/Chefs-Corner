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

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch user information from the database based on the session id
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    // Redirect or handle error if user is not found
    exit("User not found");
}

$user = mysqli_fetch_assoc($result);

// Check session user role
if (!isset($_SESSION['role'])) {
    // Handle error if user role is not set
    exit("User role not set");
}

// Update profile information if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {

    // Get profile picture details
    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp = $_FILES['profile_pic']['tmp_name'];
    $file_type = $_FILES['profile_pic']['type'];

    // Check if file is an image
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($file_type, $allowed_types)) {
        $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
    } else {
        // Move uploaded file to target directory
        $target_dir = "profile/";
        $target_file = $target_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Update user's profile information in the database including the profile picture filename
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $update_query = "UPDATE users SET fullname = '$fullname', username = '$username', email = '$email', location = '$location', profile_pic = '$file_name' WHERE user_id = $user_id";

            if (mysqli_query($conn, $update_query)) {
                // Redirect to profile page based on user role
                if ($_SESSION['role'] == 'chef') {
                    header("Location: chefprofile.php");
                } elseif ($_SESSION['role'] == 'seeker') {
                    header("Location: myprofile.php");
                } elseif ($_SESSION['role'] == 'admin') {
                    header("Location: hq.php");

                }
                exit();
            } else {
                // Handle update error
                $error_message = "Failed to update profile. Please try again.";
            }
        } else {
            $error_message = "Failed to upload profile picture. Please try again.";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
