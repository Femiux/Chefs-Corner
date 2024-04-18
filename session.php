<?php
// Start the session

session_start();


$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);


function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to get the user ID of the logged-in user
function getLoggedInUserId() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}


function loginUser($user_id, $role, $username) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role;
    $_SESSION['username'] = $username;
} 


function logoutUser() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}


function checkLoggedIn() {
    if (!isUserLoggedIn()) {
        // Redirect to the login page or show an error message
        header("Location: login.php");
        exit(); // Make sure to stop script execution after redirecting
    }
}

// Check if the user is logged out, and redirect if logged in
function checkLoggedOut() {
    if (isUserLoggedIn()) {
        // Redirect to the home page or another appropriate page
        header("Location: home.php");
        exit(); // Make sure to stop script execution after redirecting
    }
}
?>
