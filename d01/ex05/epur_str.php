#!/usr/bin/php
<?PHP
if ($argc != 2)
	return (0);
$argv[1] = trim($argv[1]);
$arr = preg_split('/ +/', $argv[1]);
for ($i = 0; $i < count($arr); $i++)
	printf("$arr[$i]%s", $i + 1 == count($arr) ? "" : " ");
printf("\n");
?>
