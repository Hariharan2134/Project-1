<?php
// Establish database connection
$host = "localhost"; 
$username = "root"; 
$password = "Hari213@"; 
$database = "contacts"; 

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $C_ID = $_POST["C_ID"];
    $Cd_no = $_POST["Cd_no"];
    $C_Name = $_POST["C_Name"];
    $C_Type = $_POST["C_Type"];
    $C_Notes = $_POST["C_Notes"];
    $C_Field = $_POST["C_Field"];
    $C_Values = $_POST["C_Values"];

    // Check if C_ID already exists
    $check_query = "SELECT COUNT(*) as count FROM contact WHERE C_ID = '$C_ID'";
    $result = $conn->query($check_query);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Error: Contact with the provided C_ID already exists. Please choose a different C_ID.";
    } else {
        // Proceed with the insertion into the contact table
        $sql_contact = "INSERT INTO contact (C_ID, C_Name, C_Type, C_Notes) VALUES ('$C_ID', '$C_Name', '$C_Type', '$C_Notes')";
        $conn->query($sql_contact);

        // Check if Cd_no already exists
        $check_cd_query = "SELECT COUNT(*) as count FROM contact_details WHERE Cd_no = '$Cd_no'";
        $cd_result = $conn->query($check_cd_query);
        $cd_row = $cd_result->fetch_assoc();

        if ($cd_row['count'] > 0) {
            echo "Error: Contact details with the provided Cd_no already exist. Please choose a different Cd_no.";
        } else {
            // Proceed with the insertion into the contact_details table
            $sql_contact_details = "INSERT INTO contact_details (Cd_no, C_ID, C_field, C_values) VALUES ('$Cd_no', '$C_ID', '$C_Field', '$C_Values')";
            $conn->query($sql_contact_details);

            echo "Data inserted successfully!";
        }
    }
}

// Close the database connection
$conn->close();
?>
