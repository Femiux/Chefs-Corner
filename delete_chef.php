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
<?php
// Your database connection and other necessary includes

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the chef from the users table
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "<script>alert('Chef deleted successfully');</script>";
        echo "<script>window.location.href='hq.php';</script>";
    } else {
        echo "<script>alert('Error deleting chef');</script>";
        echo "<script>window.location.href='hq.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request');</script>";
    echo "<script>window.location.href='hq.php';</script>";
}
?>
