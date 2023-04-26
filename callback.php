<?php
// Replace these values with your own
$client_id = 'your_client_id';
$client_secret = 'your_client_secret';
$redirect_uri = 'http://localhost/callback';
$scope = 'read:user';

// Authorization endpoint for OAuth app
$authorization_endpoint = 'https://github.com/login/oauth/authorize';

// Redirect the user to the authorization URL
header("Location: $authorization_endpoint?client_id=$client_id&scope=$scope&redirect_uri=$redirect_uri");
exit();

// After user grants authorization, GitHub will redirect back to the callback URL
if (isset($_GET['code'])) {
    // Retrieve the authorization code
    $code = $_GET['code'];

    // Token endpoint for OAuth app
    $token_endpoint = 'https://github.com/login/oauth/access_token';

    // Exchange the authorization code for an access token
    $ch = curl_init($token_endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code,
        'redirect_uri' => $redirect_uri,
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'User-Agent: My-App', // Replace with your own User-Agent header
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    // Parse the access token from the response
    $token_data = json_decode($response, true);
    $access_token = $token_data['access_token'];

    // Use the access token to make API requests
    $api_endpoint = 'https://api.github.com/user';

    $ch = curl_init($api_endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $access_token,
        'User-Agent: My-App', // Replace with your own User-Agent header
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    // Parse the response data
    $user_data = json_decode($response, true);

    // Display the user data
    echo 'Logged in as: ' . $user_data['login'];
}
