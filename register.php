<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "Hari213@";
$dbname = "user"; // Check if this is the correct database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = "";
$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO user1 (id, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id, $username, $password);
    
    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login1.php");
        exit();
    } else {
        // Handle error
        echo "Error: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id">ID:</label>
        <input type="number" name="id" required><br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
