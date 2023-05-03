<?php require_once 'config.php'; session_start();

$endpoint = "https://api.github.com/repos/".OWNER."/".REPO."/issues";
$access_token = $_SESSION['access_token'];

$issue = [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'labels' => [
        'C: ' . $_POST['client'],
        'T: ' . $_POST['type'],
        'P: ' . $_POST['priority'],
    ],
];


$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($issue));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    "Accept: application/vnd.github+json",
    "Authorization: Bearer {$access_token}",
    "X-GitHub-Api-Version: 2022-11-28",
    "User-Agent: ".APP_NAME
]);

$response = curl_exec($curl);
curl_close($curl);

var_dump($response);

