<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ch_no = $_POST["ch_no"];
    $ch_rdate = $_POST["ch_rdate"];
    $ch_name = $_POST["ch_name"];
    $ch_date = $_POST["ch_date"];
    $ch_amt = $_POST["ch_amt"];
    $b_date = $_POST["b_date"];
    $ch_status = $_POST["ch_status"];

    // Database connection parameters
    $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
    $username = "root"; // Change this if your MySQL username is different
    $password = "Hari213@"; // Change this if your MySQL password is different
    $dbname = "cheque"; // Change this to your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO cheque_transactions (ch_no, ch_rdate, ch_name, ch_date, ch_amt, b_date, ch_status)
            VALUES ('$ch_no', '$ch_rdate', '$ch_name', '$ch_date', '$ch_amt', '$b_date', '$ch_status')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
