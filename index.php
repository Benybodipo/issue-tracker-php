<?php require_once 'config.php';

// Start the session
session_start();

// If we don't have an access token, redirect the user to authorize the app
if (!isset($_SESSION['access_token'])) {
  header("Location: authorize.php");
  exit;
}

// If we have an access token, use it to make a request to the GitHub API
$access_token = $_SESSION['access_token'];
$url = 'https://api.github.com/user';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);

// Display the user's name
echo "Hello, " . $data['name'];
