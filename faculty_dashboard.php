<?php
/**
 * CS 4342 Database Management
 * Implementation Lead: Stephanie Galvan
 * Interface Lead: Julio Hernandez
 * @author Team 8 PM
 * @since 3/31/20
 * @version 1.1
 * Description: The purpose of this file is to serve as a template for students to create users and populate them into the database.
 */

require_once('config.php');
?>

<!DOCTYPE HTML>
    <head>
        <!-- CSS -->
        <link rel="icon" href="images/jams2.ico">
        <link rel="stylesheet" href="css\styles.css">
        <link rel="stylesheet" href="css\bootstrap.css">
        <link rel="stylesheet" href="css\custom.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
        <title>Faculty Dashboard</title>
    </head>
    
    <body class = "utepColors top-padding2 text-center">
        <h1 class= "largeFont">Faculty Dashboard</h1>
        <input class = "login-logo top-padding5" type = "image" alt = "events" src= "images\events.png" onclick="window.location.href = 'create_event.php';"><br>
        <input class = "login-logo top-padding2" type = "image" alt = "reports" src= "images\reportsv2.png" onclick="window.location.href = 'reports.php';"><br>
       
    </body>

    <footer class="footerLogin text-center">
        <a href="index.php">Home</a>
        <p>© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
    </footer>
</html>
