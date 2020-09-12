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
    <title>Create User Account</title>
</head>

<body class= "utepColors side-padding top-padding2">
	<h1>CREATE ACCOUNT</h1>
	<div class="top-padding2" id="menu">
		<form action="create_account.php" method="post">
            <input type="radio" name="user" value="faculty" required>
            <label >Faculty</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="user" value="volunteer">
            <label>Volunteer</label><br>
            <div class= "jamText">
                <input class="login-input" type="text" name="first_name" placeholder= "First Name" required><br><br>
                <input class="login-input" type="text" name="middle_initial" placeholder= "Middle Initial" maxlength="1"><br><br>
                <input class="login-input" type="text" name="last_name" placeholder= "Last Name" required><br><br>
				<input class="login-input" type="text" name="gender" placeholder= "Gender" required><br><br>
                <input class="login-input" type="text" name="email" placeholder= "Miners Email" required><br><br>
                <input class="login-input" type="password" name="password" placeholder= "Password" required><br><br>
                <input name='Submit' type="submit" value="Create">
            </div>
		</form>
		<br>
		<a href="index.php">Back</a></br>
	</div>
	
    <?php
    if (isset($_POST['Submit'])){
        /**
         * Grab information from the form submission and store values into variables.
         */
        $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
        $middleInitial = isset($_POST['middle_initial']) ? $_POST['middle_initial'] : " ";
        $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
		$gender = isset($_POST['gender']) ? $_POST['gender'] : " ";
        $email = isset($_POST['email']) ? $_POST['email'] : " ";
        $password = isset($_POST['password']) ? $_POST['password'] : " ";

        if  ($_POST["user"] == "faculty" ){
            //insert to faculty table;
            $queryUser  = "INSERT INTO faculty (femail, ffname, fminitial, flname, fpassword)
                        VALUES ('".$email."', '".$firstName."', '".$middleInitial."', '".$lastName."', '".$password."');";
            if ($conn->query($queryUser) === TRUE) {
            echo "New faculty user has been created successfully\n";
            echo "<p>Hello " .$firstName. " ".$middleInitial." ".$lastName."!<br> Your username is: ".$email."</p>";
            echo "Email has been sent for verification.\n";
            } 
            else {
                echo "Error: " . $queryUser . "<br>" . $conn->error;
            }
        }

        if  ($_POST["user"] == "volunteer" ){
            //insert to Volunteer table;
            $queryUser  = "INSERT INTO volunteer (vemail, vfname, vminitial, vlname, vgender, veligibility, vpassword, vtotalhours)
                        VALUES ('".$email."', '".$firstName."', '".$middleInitial."', '".$lastName."', '".$gender."', 0 , '".$password."', 0);";
            if ($conn->query($queryUser) === TRUE) {
            echo "New volunteer user has been created successfully";
            echo "<p>Hello " .$firstName. " ".$middleInitial." ".$lastName."!<br> Your username is: ".$email."</p>";
            } 
            else {
                echo "Error: " . $queryUser . "<br>" . $conn->error;
            }
        }
    }
    ?>
</body>

<footer class="footerLogin text-center">
    <p>© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
</footer>

</html>