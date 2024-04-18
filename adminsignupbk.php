<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "chefs_corner";

$conn = new mysqli($server, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

if (isset($_POST['register'])) {
    // Check if any field is empty
    if (empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword']) || empty($_POST['role'])) {
        echo "<script>alert('Please fill in all fields');</script>";
        echo "<script>window.location.href='signup.html';</script>";
        exit(); // Stop further execution if any field is empty
    }
    
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $role = $_POST["role"];

    // Check if password and confirm password match
    if ($password !== $cpassword) {
        echo "<script>alert('Password and confirm password are not the same');</script>";
        echo "<script>window.location.href='signup.html';</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $query = "INSERT INTO users (fullname, username, email, password, role) VALUES ('$fullname', '$username',  '$email', '$hashed_password', '$role')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Registration successful!');</script>";
            // Redirect to login page after successful registration
            echo "<script>window.location.href='home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error: Registration failed');</script>";
            // Handle error if registration fails
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
            echo "<script>window.location.href='signup.php';</script>";
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
