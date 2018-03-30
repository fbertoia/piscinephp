#!/usr/bin/php
<?PHP
if ($argc == 1)
	return (0);
$i = 1;
while ($i < count($argv))
{
	$argv[$i] = trim($argv[$i]);
	$arr = preg_split('/ +/', $argv[$i]);
	$ret = array_merge($arr, (array)$ret);
	$i++;
}
sort($ret);
for ($i = 0; $i < count($ret) ; $i++)
		printf("$ret[$i]\n");
?>
