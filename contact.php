<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link media="all" rel="stylesheet" href="rivet.css">
    <title>Contact Us</title>
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

<!-- VIP Sign Up Form -->
        
    </header>
    <div class="header1">

        <p><center> VIP Sign Up </center></p>
    </div>

    <main role="main" id="main-content">

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = mysqli_connect("db.soic.indiana.edu","i494f20_team83","my+sql=i494f20_team83","i494f20_team83");


        $errors = "";
        $fname = htmlspecialchars($_POST["fname"]);
        $lname = htmlspecialchars($_POST["lname"]);
        $email = htmlspecialchars($_POST["email"]); 
        $dob = htmlspecialchars($_POST["dob"]);

        if(empty($fname) or empty($lname) or empty($dob) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = "Invalid inputs";
        } else {

             $query = mysqli_query($conn, "SELECT username, email FROM register
             WHERE username = '$username';");

              $query1 = mysqli_query($conn, "SELECT email from register WHERE email = 
             '$email';");

             $data = mysqli_fetch_assoc($query);

             $data1 = mysqli_fetch_assoc($query1);

             if(!is_null($data["username"])) {
                $errors = "Username already exists";

            // } elseif(is_null($data["email"])){
                // $errors = "Email already exists";
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($conn, "INSERT INTO register (username, email, password) VALUES ('$username', '$email',
                '$password');");

                 if ($query) {
                     echo "user created";
                 }  else {
                     echo "its not working";
                 }
             }
        
    
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = mysqli_query($conn, "INSERT INTO register (username, email, password) 
            VALUES ('$username', '$email', '$password');");
            }
        }
    
         
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
    </head>

    <body>
        <h3> Register for ForMusic </h3>
        <p style="color: red;"><?php echo $errors; ?></p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"method="POST">
        <input type="text" name="username" placeholder="Username"> <br>
        <input type="text" name="email" placeholder="Email"> <br>
        <input type="text" name="password" placeholder="Password"> <br><br>
        <input type="submit">




        </form>
        <a href="login.php">Already have an account? Login to ForMusic</a>



        <div id="googleMap" style="width:100%;height:400px;"></div>

    <script>
    function myMap() {
    var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdOYQfJP0YvZuQD_JWvQ2BHGZg4pYCNIw&callback=myMap"></script>

    </body>


</html>

    


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