<?php
// Establish a connection to the database
$host = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "travelvista";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $phone_number = $_POST["Number"];
    $guests = $_POST["Guests"];
    $check_in_date = $_POST["date"];
    $destinations = $_POST["Destination"];
    $amounts = $_POST["amount"];

    // Insert data into the reservations table
    $sql = "INSERT INTO reservations (name, phone_number, guests, check_in_date, destination, amounts ) VALUES ('$name', '$phone_number', '$guests', '$check_in_date', '$destinations', '$amounts')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
