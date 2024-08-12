<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['form_token']) || $_POST['form_token'] !== $_SESSION['form_token']) {
        die("Invalid form submission");
    }

    include 'functions.php';

    $data = [
        'name' => esc_str($_POST['name']),
        'email' => esc_str($_POST['email']),
        'season' => esc_str($_POST['season']),
        'region' => esc_str($_POST['region']),
        'interests' => isset($_POST['interests']) ? implode(', ', $_POST['interests']) : 'None',
        'participants' => esc_str($_POST['participants']),
        'message' => esc_str($_POST['message']),
    ];

    include 'destinations.php';
    
    // Include the results page
    include 'results.php';
} else {
    header("Location: form.php");
    exit;
}
