<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link media="all" rel="stylesheet" href="rivet.css">
    <title>Home</title>
</head>
<body>

<form method="post" name="myemailform" action="email.php">

Name:	<input type="text" name="name">

Email: <input type="text" name="email">

Compose Message:	<textarea name="message"></textarea>

<input type="submit" value="Send Form">
</form>


<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];



	$email_from = 'pacostacos@gmail.com';

	$email_subject = "A VIP Member has sent you a message!";

	$email_body = "You have received a new message from the $name.".
    "Here is the message: $message";





  $to = "fortierteddy@gmail.com";

  $headers = "From: $email_from";

  $headers .= "Reply-To: $visitor_email";

  mail($to,$email_subject,$email_body,$headers);

 ?>

</body>
</html>