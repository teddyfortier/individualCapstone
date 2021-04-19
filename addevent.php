<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");


        $errors = "";
        $title = htmlspecialchars($_POST["title"]);
        $date = htmlspecialchars($_POST["date"]);
        $location = htmlspecialchars($_POST["location"]); 
        $description = htmlspecialchars($_POST["description"]);
        $status = htmlspecialchars($_POST["status"]);
        echo('s '. $status);

        if(empty($title) || empty($date) || empty($location) || empty($description) || $status < 0) {
            $errors = "Invalid inputs";
        } else {

            $sql = "INSERT INTO events (title, date, location, description, status) VALUES ('".$title."', '".$date."',
            '".$location."', '".$description."', ".$status.");";
            echo($sql);

                $query = mysqli_query($conn,$sql);

                 if ($query) {
                     echo "event created <a href= 'events.php'> See events <a/>" ;
                 }  else {
                     echo "its not working";
                 }
             }
        
    
        }
    
         
?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link media="all" rel="stylesheet" href="rivet.css">
    <title>Contact Us</title>
    <title>maps</title>
    <style>
        #map{
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="rvt-header" role="banner">
        <a class="rvt-skip-link" href="#main-content">Skip to content</a>
        <div class="rvt-header__trident">
            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="60" height="70" viewBox="0 0 60 70" aria-labelledby="iu-logo">
                <title id="iu-logo">Indiana University</title>
                <rect width="60" height="70" fill="#900" />
                <polygon points="35.96 18.44 35.96 21.84 38.52 21.84 38.52 40.51 33.41 40.51 33.41 15.9 35.96 15.9 35.96 12.5 24.04 12.5 24.04 15.9 26.58 15.9 26.58 40.51 21.48 40.51 21.48 21.84 24.04 21.84 24.04 18.44 12.09 18.44 12.09 21.84 14.65 21.84 14.65 43.79 18.72 48.15 26.58 48.15 26.58 53.26 24.04 53.26 24.04 57.5 35.96 57.5 35.96 53.26 33.41 53.26 33.41 48.15 40.93 48.15 45.33 43.79 45.33 21.84 47.91 21.84 47.91 18.44 35.96 18.44" fill="#fff" />
            </svg>
        </div>
        <span class="rvt-header__title">
            <a href="index.php">Pacos Tacos</a>
        </span>
        </header>
    <main role="main" id="main-content">




    <h3><b> Add Event </b></h3>
        <p style="color: red;"><?php echo $errors; ?></p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"method="POST">
        <input type="text" name="title" placeholder="Event Title"> <br>
        <input type="date" name="date" placeholder="Date"> <br>
        <input type="text" name="location" placeholder="Location"> <br>
        <input type="text" name="description" placeholder="Description"> <br>
        <p> Display Status (Y/N) </p>
        <input id="yes" type="radio" name="status" value="1"> <label for="yes"> Yes </label> <br>
        <input id="no" type="radio" name="status" value="0"> <label for="no"> No </label> <br><br>
        <input type="submit">
    </form>





    </main>
    
    






        <footer class="rvt-footer m-top-xxl" role="contentinfo">
        <div class="rvt-footer__copyright-lockup">
            <div class=rvt-footer__trident>
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 20 25">
                    <polygon points="13.33 3.32 13.33 5.21 14.76 5.21 14.76 15.64 11.9 15.64 11.9 1.9 13.33 1.9 13.33 0 6.67 0 6.67 1.9 8.09 1.9 8.09 15.64 5.24 15.64 5.24 5.21 6.67 5.21 6.67 3.32 0 3.32 0 5.21 1.43 5.21 1.43 17.47 3.7 19.91 8.09 19.91 8.09 22.76 6.67 22.76 6.67 25.13 13.33 25.13 13.33 22.76 11.9 22.76 11.9 19.91 16.1 19.91 18.56 17.47 18.56 5.21 20 5.21 20 3.32 13.33 3.32" fill="#900"/>
                </svg>
            </div>
            <p><a href="https://www.iu.edu/copyright/index.html">Copyright</a> &copy; 2017 The Trustees of <a href="https://www.iu.edu/">Indiana University</a></p>
        </div>
        <ul class="rvt-footer__aux-links">
            <li class="rvt-footer__aux-item">
                <!-- You can learn more about privacy policies and generate one
                     for your site here:
                     https://protect.iu.edu/online-safety/tools/privacy-notice/index.html -->
                <a href="#0">Privacy Policy</a>
            </li>
            <li class="rvt-footer__aux-item">
                <a href="https://accessibility.iu.edu/">Accessibility help</a>
            </li>
        </ul>
    </footer>
    <script src="./js/rivet.js"></script>
</body>
</html>