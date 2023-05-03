<?php  if(!isset($_SESSION)) {  session_start(); }  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
    <body>
        <header>
            <?php if (isset($_SESSION['access_token'])) : ?>
                <?php include "navbar.php"; ?>
            <?php endif ?>
        </header>
        <main>
            <div id="cover">
            <div class="container">

        
