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
$data = array(
  'client_id' => CLIENT_ID,
  'client_secret' => CLIENT_SECRET,
  'code' => $_GET['code'],
  'redirect_uri' => REDIRECT_URI
);
// Send a POST request to the access token endpoint
$ch = curl_init('https://github.com/login/oauth/access_token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$result = curl_exec($ch);
curl_close($ch);

// Parse the JSON response to extract the access token
$response = json_decode($result);
$access_token = $response->access_token;

$_SESSION['access_token'] = $response->access_token;
// echo $access_token;
// exit;
// Redirect the user to the index page
header("Location: index.php");
exit;
