<?php  declare(strict_types=1);
session_start();
require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $client_id = $_ENV['CLIENT_ID'];
// $client_secret = $_ENV['CLIENT_SECRET'];
// $redirect_uri = 'https://issue-tracker-1grid.000webhostapp.com';

// // Set up the URL for the authorization endpoint
// $authorize_url = 'https://github.com/login/oauth/authorize';

// // Set up the URL for the access token endpoint
// $access_token_url = 'https://github.com/login/oauth/access_token';



// if (!isset($_SESSION['access_token'])) {
//     // If we don't have an authorization code, redirect the user to GitHub to authorize the app
//     if (!isset($_GET['code'])) {
//       $url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_uri";
//       header("Location: $url");
//       exit;
//     }
//     echo $_GET['code'] . "No code";
//     die();
//     // If we have an authorization code, exchange it for an access token
//     $code = $_GET['code'];
//     $url = "https://github.com/login/oauth/access_token?client_id=$client_id&client_secret=$client_secret&code=$code&redirect_uri=$redirect_uri";
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
//     $response = curl_exec($ch);
//     curl_close($ch);
//     $data = json_decode($response, true);
//     $_SESSION['access_token'] = $data['access_token'];
  
//     // Redirect the user to the callback URL
//     header("Location: $redirect_uri");
//     exit;
// } else {

//     $access_token = $_SESSION['access_token'];
//     $url = 'https://api.github.com/user';
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token"));
//     $response = curl_exec($ch);
//     curl_close($ch);
//     $data = json_decode($response, true);
    
//     // Display the user's name
//     echo "Hello, " . $data['name'];
// }


?>

<?php require "./partials/header.php"; ?>
    <br>
    <br>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#issueModalForm">CREATE NEW ISSUE</button>
    <?php require_once("./partials/new-issue-modal-form.php"); ?>
    <br>
    <br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Priority</th>
                <th scope="col">Type</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            
        </tbody>
    </table>

<?php require "./partials/footer.php"; ?>

          