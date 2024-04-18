<?php
session_start(); 

$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user data from database based on email
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];
            // Redirect based on role
            if ($row["role"] == "admin") {
                header("Location: hq.php");
                exit();
            } elseif ($row["role"] == "chef") {
                header("Location: chefprofile.php");
                exit();
            } elseif ($row["role"] == "seeker") {
                header("Location: home.php");
                exit();
            } else {
                // Handle unexpected role
            }
            
        } else {
            // Incorrect password
            echo "<script>alert('Invalid password!');</script>";
            echo "<script>window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // User not found
        echo "<script>alert('User not found');</script>";
        echo "<script>window.location.href='login.php';</script>";
        exit();
    }
}

// Close database connection
$conn->close();
?>
