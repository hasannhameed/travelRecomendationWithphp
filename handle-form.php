<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form token
    if (!isset($_POST['form_token']) || $_POST['form_token'] !== $_SESSION['form_token']) {
        die("Invalid form submission");
    }

    // Sanitize and retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $season = $_POST['season']; 
    $region = $_POST['region'];
    $interests = isset($_POST['interests']) ? implode(', ', $_POST['interests']) : 'None';
    $participants = $_POST['participants'];
    $message = $_POST['message'];

    include 'functions.php';

    /// Retrieve and sanitize data
$data = [
    'name' => esc_str($_POST['name']),
    'email' => esc_str($_POST['email']),
    'season' => esc_str($_POST['season']),
    'region' => esc_str($_POST['region']),
    'interests' => isset($_POST['interests']) ? esc_str(implode(', ', $_POST['interests'])) : 'None',
    'participants' => esc_str($_POST['participants']),
    'message' => esc_str($_POST['message'])
];


    // Database connection
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "mytrip"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape special characters for use in the SQL query
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $season = $conn->real_escape_string($season);
    $region = $conn->real_escape_string($region);
    $interests = $conn->real_escape_string($interests);
    $participants = $conn->real_escape_string($participants);
    $message = $conn->real_escape_string($message);

    // Prepare SQL statement
    $sql = "INSERT INTO traver (name, email, season, region, interests, participants, message) 
            VALUES ('$name', '$email', '$season', '$region', '$interests', '$participants', '$message')";

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();

    include 'destinations.php';
    include 'results.php';
} else {
    header("Location: form.php");
    exit;
}
?>
