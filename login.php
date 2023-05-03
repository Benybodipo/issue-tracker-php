<?php require_once 'config.php';

session_start();

// If we don't have an access token, redirect the user to authorize the app
if (isset($_SESSION['access_token'])) {
  header("Location: index.php");
  exit;
}

?>
<style>
    main {
        background: url('./assets/images/backgroud.jpg');
        background-attachment: fixed;
        background-size: cover;
        position: relative;
        width: 100%;
        height: 100%;
    }

    #cover {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.4);
        position: absolute;
        top: 0;
        left: 0;
        
    } 
</style>

<?php require_once('partials/header.php'); ?>
    <div class="d-flex justify-content-center align-items-center"   id="cover">
        <div class="text-center">
            <h2 class="text-light text-center">Welcome to Issue Tracker</h2>
            <p class="text-light">Please log in in order to access the issues </p>
            <br><br><br>
            <a class="btn btn-secondary btn-lg" href="authorize.php">
                <i class="fab fa-github"></i>
                <span class="ml-2">LOG IN WITH GITHUB</span>
            </a>
        </div>

    </div>

<?php require_once('partials/footer.php'); ?>