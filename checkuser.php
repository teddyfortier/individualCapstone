<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");

    $section = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT admin.email FROM admin WHERE admin.email = '$section'";

    $result = mysqli_query($conn, $sql);

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $_SESSION['admin'] = true;
       echo '{"admin":"true"}';
    }

}


?>