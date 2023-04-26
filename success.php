<?php
// Set the URL for the access token endpoint
$token_url = 'https://github.com/login/oauth/access_token';

// Set the client ID, client secret, and redirect URI
$client_id = 'bf56b82110ed92bfc649';
$client_secret = '7c10b630520202c13ee98a8551b19b3fb34adb54';
$redirect_uri = 'http://localhost/issue-tracker/callback.php';

// Get the authorization code from the query string
$code = $_GET['code'];

// Build the POST data for the access token request
$post_data = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $code,
    'redirect_uri' => $redirect_uri,
);

// Set the headers for the access token request
$headers = array(
    'Accept: application/json',
    'User-Agent: MyOAuthApp'
);

// Build the access token request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Send the access token request
$response = curl_exec($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Extract the access token from the response
$access_token = $data['access_token'];

// Use the access token to make authenticated requests to the GitHub API
// For example, you can use the access token to retrieve information about the authenticated user:
$user_url = 'https://api.github.com/user';
$headers = array(
    'Accept: application/vnd.github.v3+json',
    'User-Agent: MyOAuthApp',
    'Authorization: Bearer ' . $access_token,
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$user_data = json_decode($response, true);

// Output the user's
