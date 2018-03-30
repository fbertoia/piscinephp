<?php
if ($_GET[action])
{
	if ($_GET["action"] == "set"){
		setcookie($_GET["name"], $_GET["value"], time() + (3600));
	}
	else if ($_GET["action"] == "get"){
		if(!isset($_COOKIE[$_GET["name"]])) {
		} else {
		  print $_COOKIE[$_GET["name"]];
		}
	}
	else
		setcookie($_GET["name"], '');
}
?>
