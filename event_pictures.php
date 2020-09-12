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
        
            <img class = "login-logo" src= "images\eventPictures.png" onclick="window.location.href = 'event_pictures.php';")?><br><br>
            <div class = "center logo18">
            <?php
                $files = scandir('uploads/');
                foreach($files as $file) {
                    if($file !== "." && $file !== "..") {
                        echo "<br><img src='uploads/".$file."'>";
                    }
                }
            ?>
            </div>
    </body>
    <footer class="footerLogin">
    <div class="right-padding20">
    </div>    
    <a href="index.php">Home</a>
    <p class= "text-center">© 2020 JAMS Inc. ALL RIGHTS RESERVED</p>
    </footer>
</html>
