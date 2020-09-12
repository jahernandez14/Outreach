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
    <title>Volunteer Dashboard</title>
</head>

<body class= "utepColors side-padding top-padding2">
    <input class = "top-padding5 text-center" type = "image" alt = "events" src= "images\volunteerDashboard.png"onclick="window.location.href = 'volunteer_dashboard.php';"><br>
	<div class="top-padding1" id="menu">
    <h3>Report Hours Worked For Event</h3> 
    <form action="volunteer_dashboard.php" method="post">
            <div class= "jamText">
                <input class="login-input" type="text" name="eventID" placeholder= "Event ID" required><br><br>
                <input class="login-input" type="text" name="hoursWorked" placeholder= "Hours Worked" required><br><br>
                <input name='Submit' type="submit" value="Submit">
            </div>
		</form>
    </div>
    
    <form action="volunteer_dashboard.php" method="post" enctype="multipart/form-data">
        <br><br><h3>Upload Event Image</h1>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input class = "utepColors" type="submit" value="Upload Image" name="submit"><br><br>
    </form>

    <h3>Available Events</h3>
    <?php
    session_start();
    $name =$_SESSION['faculty_user'];

    $query = "SELECT * FROM event where edate  >= CURDATE()";
    $result = $conn->query($query); 
    
    echo "<table>";
    
    while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . $row['ename'] . "</td></tr>";
    }
    
    echo "</table>";

    ?>

    <h3>Past Events Attended</h3>
    <?php
    
    $query = "SELECT * FROM event where edate  <= CURDATE()";
    $result = $conn->query($query); 
    
    echo "<table>";
    
    while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . $row['ename'] . "</td></tr>";
    }
    
    echo "</table>";

    ?>

</body>

<footer class="footerLogin text-center">
    <div class="right-padding20">
    <input class = "login-logo" type = "image" alt = "pictures" src= "images\pictures.png" onclick="window.location.href = 'event_pictures.php';"><br>Event Pictures
    </div>  
    <a href="index.php">Home</a>
    <p>© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
</footer>

</html>

<?php
    if (isset($_POST['Submit'])){

        $hoursWorked = isset($_POST['hoursWorked']) ? $_POST['hoursWorked'] : " ";

        //insert to volunteer table;
        $queryUser  = "update volunteer set volunteer.vtotalhours = volunteer.vtotalhours + '".$hoursWorked."' where vemail = '".$name."';;";
        
        if ($conn->query($queryUser) === TRUE) {
        echo "<br>Your hours have been updated successfully";
        } 
        else {
            echo "<br>Error hours could not be updated";
        }
    }
    ?>

<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Image has been uploaded successfully";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>