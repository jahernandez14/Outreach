<!DOCTYPE HTML>
    <head>
        <!-- CSS -->
        <link rel="icon" href="images/jams2.ico">
        <link rel="stylesheet" href="css\styles.css">
        <link rel="stylesheet" href="css\bootstrap.css">
        <link rel="stylesheet" href="css\custom.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
        <title>JAMS</title>
    </head>
    
    <body class = "utepColors top-padding2 text-center">

            <img class = "login-logo" src= "images\jams2.png")?>
            <h1 class = "largeFont">Outreach JAMS Style!</h1>
            <div class= "top-padding1" id="menu">
                <form action="index.php" method="post">
                    <div class= "jamText">
                        <input class="login-input" type="text" name="email" placeholder="Miners Email" required/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="login-input" type="password" name="password" placeholder="Password" required/>    
                    </div>
                    <a class = "utepColors"href="create_account.php">CREATE ACCOUNT</a><br></br>
                    <input class = "text-center menu jamText" name='Submit' type="submit" value="Log In" class="btn btn-primary"><br><br>
                </form>
            </div>
    </body>
    <footer class="footerLogin">
    <div class="right-padding20">
    <input class = "login-logo" type = "image" alt = "pictures" src= "images\pictures.png" onclick="window.location.href = 'event_pictures.php';"><br>Event Pictures
    </div>    
    <p class= "text-center">© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
    </footer>
</html>

<?php
/**
 * CS 4342 Database Management
 * Implementation Lead: Stephanie Galvan
 * Interface Lead: Julio Hernandez
 * @author Team 8 PM
 * @since 5/5/2020
 * @version 3.0
 * Description: The purpose of this file is to serve as simple login system that validates username and password.
 */

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)){
  if (isset($_POST['Submit'])){
    $input_email = isset($_POST['email']) ? $_POST['email'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
    
    $queryFaculty = "SELECT * FROM faculty WHERE femail='".$input_email."' AND fpassword='".$input_password."';";
    $resultFaculty = $conn->query($queryFaculty);

    $queryVolunteer = "SELECT * FROM volunteer WHERE vemail='".$input_email."' AND vpassword='".$input_password."';";
    $resultVolunteer = $conn->query($queryVolunteer);

    if ($resultFaculty ->num_rows > 0  ) {
        //if there is a result, that means that the user was found in the database
        $_SESSION['faculty_user'] = $input_email; 
        $_SESSION['logged_in'] = true;
        header("Location: faculty_dashboard.php");
        //echo"Faculty user found";
    }

    if ($resultVolunteer ->num_rows > 0 && $resultFaculty ->num_rows < 1) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['faculty_user'] = $input_email; 
      $_SESSION['logged_in'] = true;
      header("Location: volunteer_dashboard.php");
      //echo"Volunteer user found";
    }

    if ($resultVolunteer ->num_rows < 1 && $resultFaculty ->num_rows < 1) { 
      $message = "Invalid Email or Password";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>