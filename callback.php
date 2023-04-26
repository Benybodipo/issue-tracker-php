<?php require_once 'config.php';

// Start the session
session_start();

// If we don't have an authorization code, redirect the user to GitHub to authorize the app
if (!isset($_GET['code'])) {
  $url = "https://github.com/login/oauth/authorize?client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
  header("Location: $url");
  exit;
}

// If we have an authorization code, exchange it for an access token
$code = $_GET['code'];
$url = "https://github.com/login/oauth/access_token?client_id=".CLIENT_ID."&client_secret=".CLIENT_SECRET."&code=$code&redirect_uri=".REDIRECT_URI;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$_SESSION['access_token'] = $data['access_token'];

// Redirect the user to the index page
header("Location: index.php");
exit;
