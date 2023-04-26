<?php

require_once 'config.php';

$url = "https://github.com/login/oauth/authorize?client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
header("Location: $url");
exit;