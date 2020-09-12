
<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css"> 
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
<title>CS 4342 Student Login</title>
</head>
<body>
<h1>USER LOG IN</h1>
<div id="menu">
<form action="student_login.php" method="post">
username: <input type="text" name="username"><br><br>
password: <input type="password" name="password"><br><br>
<input name='Submit' type="submit" value="Submit">
</form>
</div>
<a href="student_create_account.php">CREATE USER ACCOUNT</a><br>

<br>
</div>
<a href="index.php">Back</a><br>

</body>
</html>

<?php
/**
 * CS 4342 Database Management
 * @author Kevin Apodaca
 * @since 2/12/20
 * @version 1.0
 * Description: The purpose of this file is to serve as simple login system that validates username and password.
 */

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)){
  if (isset($_POST['Submit'])){
    $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
    
    $queryStudent = "SELECT * FROM Student  WHERE U_username='".$input_username."' AND U_Password='".$input_password."';";
    $resultStudent = $conn->query($queryStudent);

    if ($resultStudent ->num_rows > 0  ) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['student_user'] = $input_username; 
      $_SESSION['logged_in'] = true;
      //header("Location: home.php");
      echo"User found";
    } else {
      echo "User not found.";
    }
  }
}
?>
