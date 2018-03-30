<?php
	if ($_SERVER[PHP_AUTH_USER] == "zaz")
	{
		if($_SERVER[PHP_AUTH_PW] == "jaimelespetitsponeys")
		{
			header("Content-Type: text/html");
			$img = file_get_contents("../img/42.png");
			$img = base64_encode($img);
			echo "<html><body>
			Bonjour Zaz<br/>
			<img src='data:image/png;base64,$img'>
			</body></html>";
		}
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Espace membre"');
		header("HTTP/1.0 401 Unauthorized");
		echo '<html><body>Cette zone est accessible uniquement aux membres du site</body></html>';
	}
?>
