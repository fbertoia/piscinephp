<?php
$keys = array_keys($_GET);
foreach($keys as $paramName)
	printf("$paramName: %s\n", $_GET[$paramName]);
?>
