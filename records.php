<?php
session_start();
if ($_SESSION['admin'] != true){
    echo('You are not admin');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link media="all" rel="stylesheet" href="rivet.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="554234175160-1v7h5ac6tltbrolrcath39gb0djk16ld.apps.googleusercontent.com">
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
    <div class="q1">
            
            <p>Search VIP Members by Full Name: </p>
            <form action="vip.php" method="POST">
                <select name='form-section' class="select">
                    <?php
                    $conn = mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error() . "<br>");
                    }

                    $result = mysqli_query($conn, "SELECT CONCAT(fname, ' ', lname) AS fullname, vipid FROM vip");
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                                unset($fullname, $vip);
                                $fullname = $row['fullname'];
                                $vipid = $row['vipid']; 
                                echo '<option value="'.$vipid.'">'.$fullname.'</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Search">
            </form>
        </div>

        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <a href="#" onclick="signOut();">Sign out</a>

        
<script>
    function onSignIn(googleUser) {}
        function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        // $.ajax({
        //             type: "POST",
        //             url: "deletesession.php",
        //             data: {
        //                 'email': email,
        //             },
        //             cache: false,
        //             success: function (data) {
        //                 var obj = JSON.parse(data);
        //                 if (obj.logout == 'true') {
        //                     location.assign('login.php');
        //                 }
                        
                    
        //             }
        //         });
        location.assign('deletesession.php');
    });
  }
</script>

<div class="q1">
            
            <p>Search VIP Members by Date of Birth: </p>
            <form action="vip2.php" method="POST">
                <select name='form-section' class="select">
                    <?php
                    $conn = mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error() . "<br>");
                    }

                    $result = mysqli_query($conn,"SELECT DISTINCT dob, vipid FROM vip");
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                                unset($dob, $vip);
                                $dob = $row['dob'];
                                $vipid = $row['vipid']; 
                                echo '<option value="'.$vipid.'">'.$dob.'</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Search">
            </form>
        </div>

    <table>
        <tr>
            <th><b>First Name</b></th>
            <th><b>Last Name</b></th>
            <th><b>Email</b></th>
            <th><b>Date of Birth</b></th>
        <tr>

        <?php

        $conn=mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "<br>");
        }

        $sql = "SELECT fname, lname, email, dob FROM vip ORDER BY dob";
        $result = $conn-> query($sql);

        if($result-> num_rows > 0 ){
            while($row = $result-> fetch_assoc()) {
                echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["dob"]."</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 results";
        }

        $conn-> close();

        ?>

    </table>

        <br>
        <br>
        <br>
        <br>

        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <a href="#" onclick="signOut();">Sign out</a>

        
<script>
    function onSignIn(googleUser) {}
        function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        location.assign('login.php');
    });
  }
</script>


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