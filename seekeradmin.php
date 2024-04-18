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

// Fetching chefs data
$query = "SELECT users.user_id, users.fullname, users.username, users.location, COUNT(recipetab.recipe_id) AS recipe_count
          FROM users
          LEFT JOIN recipetab ON users.user_id = recipetab.chef_id
          WHERE users.role = 'seeker'
          GROUP BY users.user_id";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Check if 'user_id' key exists in the $row array
        if (isset($row['user_id'])) {
            $userId = $row['user_id'];
        } else {
            $userId = 'N/A'; // Or handle this case accordingly
        }
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['recipe_count'] . "</td>";
        echo "<td><a href='delete_seeker.php?id=" . $row['user_id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo '<tr><td colspan="5">No seekers found</td></tr>';
}

// Close the database connection
$conn->close();
?>