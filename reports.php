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
        <title>Reports</title>
    </head>

        <body class = "utepColors top-padding2 side-padding">
        <input class = "top-padding5" type = "image" alt = "reports" src= "images\reportsv2.png" onclick="window.location.href = 'reports.php';"><br>

        <form action="reports.php" method="post">
            <input type="radio" name="report" value="report1" required><label >Faculty Count Report</label><br>
            <input type="radio" name="report" value="report2"><label> Volunteer Count Report</label><br>
            <input type="radio" name="report" value="report3"><label> Event Volunteer Attendee Count</label> &nbsp;&nbsp; <input class="jamText login-input3" type="text" name="id" placeholder= "Event ID"><br>
            <input type="radio" name="report" value="report4"><label> Volunteer Total Hours</label>&nbsp;&nbsp;<input class="jamText" type="text" name="name" placeholder= "Volunteer Email"><br>
            <input type="radio" name="report" value="report5"><label> Equipment Quantity</label>&nbsp;&nbsp;<input class="jamText" type="text" name="item" placeholder= "Equipment Name"><br><br>
            <input type="radio" name="report" value="report6"><label> Event Attendance List</label>&nbsp;&nbsp;<input class="jamText" type="text" name="list" placeholder= "Event ID"><br><br>
            <input class= "jamText" name='Submit' type="submit" value="Submit">
        </form>
            <br>
            <a href="faculty_dashboard.php">Back</a>
    </body>

    <footer class="footerLogin text-center">
    <a href="faculty_dashboard.php">Home</a>
        <p>© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
    </footer>
</html>

<?php
    if (isset($_POST['Submit'])){
        if  ($_POST["report"] == "report1" ){
            $queryFaculty = "SELECT femail FROM faculty;";
            $result = $conn->query($queryFaculty); 
            echo "<br><h3>Faculty Count: " . $result->num_rows. "</h3>";
        }

        if  ($_POST["report"] == "report2" ){
            $queryVolunteer = "SELECT vemail FROM volunteer;";
            $result = $conn->query($queryVolunteer); 
            echo "<br><h3>Volunteer Count: " . $result->num_rows. "</h3>";
        }

        if  ($_POST["report"] == "report3"){
            $id = $_POST["id"];
            $queryVolunteer = "SELECT eid FROM event_attendee where eid = $id;";
            $result = $conn->query($queryVolunteer);
            if($result->num_rows >0){  
                echo "<br><h3>Volunteer Count: " . $result->num_rows. "</h3>";
            }
            else{
                echo "<br><h3>Event not found";
            }
        }

        if  ($_POST["report"] == "report4"){
            $name = $_POST["name"];
            $queryVolunteer = "SELECT vtotalhours FROM volunteer where vemail = '$name' ;";
            $result = $conn->query($queryVolunteer);
            if($result->num_rows >0){
                $row = mysqli_fetch_row($result);  
                echo "<br><h3> Total hours: " .$row[0]. "</h3>";
            }
            else{
                echo "<br><h3>Volunteer Not Found</h3>";
            }
        }

        if  ($_POST["report"] == "report5"){
            $item = $_POST["item"];
            $queryVolunteer = "SELECT dname FROM device where dname = '$item';";
            $result = $conn->query($queryVolunteer);
            if($result->num_rows >0){  
                echo "<br><h3> " .$item. " Count: " . $result->num_rows. "</h3>";
            }
            else{
                echo "<br><h3>Equipment not found";
            }
        }

        if  ($_POST["report"] == "report6"){
            $item = $_POST["list"];
            session_start();
            $name =$_SESSION['faculty_user'];

            $query = "SELECT * FROM volunteer WHERE vemail IN (SELECT eattendee FROM event_attendee WHERE eid = '$item');";
            $result = $conn->query($query); 

            echo "<h1><bold>Event Attendance List";
            
            echo "<h3><table>";

            echo "<tr>";
            echo "<th scope='col'>First Name</th>";
            echo "<th scope='col'>Last Name</th>";
            echo "<th scope='col'>Email</th>";
            echo "</tr>";
            
            while($row = mysqli_fetch_array($result)){
            echo "<h1><tr><td>" . $row['vfname'] ."</td><td>". $row['vlname'] . "</td><td>" . $row['vemail'] . "</td></tr>";
            }
            
            echo "</table>";

            $id = $_POST["list"];
            $queryVolunteer = "SELECT eid FROM event_attendee where eid = $id;";
            $result = $conn->query($queryVolunteer);
            if($result->num_rows >0){  
                echo "<br><h3>Volunteer Count: " . $result->num_rows. "</h3>";
            }
            else{
                echo "<br><h3>Event not found";
            }
        }
    }
    ?>