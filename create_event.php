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
    <title>Create Event</title>
</head>

<body class= "utepColors side-padding top-padding2">
    <input class = "top-padding5 text-center" type = "image" alt = "events" src= "images\events.png"><br>
	<div class="top-padding1" id="menu">
		<form action="create_event.php" method="post">
            <div class= "jamText">
                <input class="login-input" type="text" name="eventID" placeholder= "Event ID" required><br><br>
                <input class="login-input" type="text" name="eventURL" placeholder= "Event URL" required><br><br>
                <input class="login-input" type="text" name="eventName" placeholder= "Event Name" required><br><br>
				<input class="login-input" type="text" name="eventLocation" placeholder= "Event Location" required><br><br>
                <input class="login-input" type="text" name="eventTime" placeholder= "Event Time" required><br><br>
                <input class="login-input" type="text" name="eventDate" placeholder= "Event Date (YYYY/MM/DD)" required><br><br>
                <input class="login-input" type="text" name="maxVolunteers" placeholder= "Max Volunteer Capacity" required><br><br>
                <input name='Submit' type="submit" value="Create">

                
            </div>
		</form>
		<br>
		<a href="faculty_dashboard.php">Back</a></br>
	</div>
	
    <?php
    session_start();
    $name =$_SESSION['faculty_user'];
    if (isset($_POST['Submit'])){
        /**
         * Grab information from the form submission and store values into variables.
         */
        $eventID = isset($_POST['eventID']) ? $_POST['eventID'] : " ";
        $eventURL = isset($_POST['eventURL']) ? $_POST['eventURL'] : " ";
        $eventName = isset($_POST['eventName']) ? $_POST['eventName'] : " ";
		$eventLocation = isset($_POST['eventLocation']) ? $_POST['eventLocation'] : " ";
        $eventTime = isset($_POST['eventTime']) ? $_POST['eventTime'] : " ";
        $eventDate = isset($_POST['eventDate']) ? $_POST['eventDate'] : " ";
        $maxVolunteers = isset($_POST['maxVolunteers']) ? $_POST['maxVolunteers'] : " ";

        //insert to Event table;
        $queryUser  = "INSERT INTO event (eid, eurl, ename, elocation, etime, edate, emaximumvolunteers, evolunteercount,  Creates_femail)
                    VALUES ('".$eventID."', '".$eventURL."', '".$eventName."', '".$eventLocation."', '".$eventTime."', '".$eventDate."', '".$maxVolunteers."', NULL, '".$name."');";
        if ($conn->query($queryUser) === TRUE) {
        echo "New event $eventName has been created successfully!";
        } 
        else {
            echo "Error $eventName event could not be created!";
        }
    }
    ?>

</body>

<footer class="footerLogin text-center">
    <a href="faculty_dashboard.php">Home</a>
    <p>© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
</footer>

</html>