<?php
// Create connection
$conn=mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}

// Grab POST Data
$section = mysqli_real_escape_string($conn, $_POST['form-section']);

$sql = "SELECT vip.fname, vip.lname, vip.email, 
vip.dob FROM vip WHERE vip.dob = '$section'";

$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table>";
	echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Date of Birth</th></tr>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["dob"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results<br>";
}
echo "$num_rows Rows <br>";

// Close Connection
mysqli_close($conn);
?>