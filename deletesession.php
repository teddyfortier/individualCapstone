<?php
session_start();

$_SESSION['admin'] = "";
if($_SESSION['admin'] == "") {
	echo '{"logout":"true"}';
}

?>