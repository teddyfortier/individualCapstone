<?php

        $conn = mysqli_connect("db.luddy.indiana.edu","i494f20_ttfortie","my+sql=i494f20_ttfortie","i494f20_ttfortie");


        $errors = "";

        $eventid_delete = mysqli_real_escape_string($conn, $_GET['eventid']);
            
            $query = "DELETE from events WHERE eventid=" . $eventid_delete;
            echo $query;
            mysqli_query($conn, $query);
            
            
            header ("location: events.php");
           
    

    
         
?>
