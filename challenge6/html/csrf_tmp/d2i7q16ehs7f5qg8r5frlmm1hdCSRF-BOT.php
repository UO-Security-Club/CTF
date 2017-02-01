<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
	setcookie('Sally', 'itsallgood');
}
?>
<html><br><b>Link:</b><br><script>location.href='/<broken>?isSally='+document.cookie;</script></html>
