<?php
if (!$_SESSION['authenticated']) {
	Header ("Location: /login.php");
}


?>
