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

// Query to fetch counts
$recipe_count_query = "SELECT COUNT(*) as recipe_count FROM recipetab";
$seeker_count_query = "SELECT COUNT(*) as seeker_count FROM users WHERE role = 'seeker'";
$chef_count_query = "SELECT COUNT(*) as chef_count FROM users WHERE role = 'chef'";
$admin_count_query = "SELECT COUNT(*) as admin_count FROM users WHERE role = 'admin'";

// Execute queries
$recipe_count_result = $conn->query($recipe_count_query);
$seeker_count_result = $conn->query($seeker_count_query);
$chef_count_result = $conn->query($chef_count_query);
$admin_count_result = $conn->query($admin_count_query);



// Fetch counts from results
if ($recipe_count_result->num_rows > 0) {
    $recipe_row = $recipe_count_result->fetch_assoc();
    $recipe_count = $recipe_row["recipe_count"];
}
if ($seeker_count_result->num_rows > 0) {
    $seeker_row = $seeker_count_result->fetch_assoc();
    $seeker_count = $seeker_row["seeker_count"];
}
if ($chef_count_result->num_rows > 0) {
    $chef_row = $chef_count_result->fetch_assoc();
    $chef_count = $chef_row["chef_count"];
}
if ($admin_count_result->num_rows > 0) {
    $admin_row = $admin_count_result->fetch_assoc();
    $admin_count = $admin_row["admin_count"];
}

// Close connection
$conn->close();
?>