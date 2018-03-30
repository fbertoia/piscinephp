#!/usr/bin/php
<?PHP
function error_message($nb)
{
	if ($nb == 1)
		echo "Incorrect Parameters\n";
	if ($nb == 2)
		echo "Syntax Error\n";	
	return (0);
}

function is_nb(&$str, &$arr)
{
	$i = 0;
	while (ord($str[$i]) && is_numeric(substr($str, 0, $i + 1)))
		$i++;
	if (!$i)
		return (false);
	$arr[] = substr($str, 0, $i);
	$str = substr($str, $i);
	return (true);
}
$nb = 0;
$base = "+-*/%";
if ($argc != 2)
	return (error_message(1));
$arr = Array();
if (!preg_match("/^\s*(-?[0-9]+)\s*([\+\-\*\/\%])\s*(-?[0-9]+)\s*$/", $argv[1], $arr))
	return (error_message(2));
array_shift($arr);
if ($arr[1] == '+')
	$nb = $arr[0] + $arr[2];
if ($arr[1] == '-')
	$nb = $arr[0] - $arr[2];
if ($arr[1] == '*')
	$nb = $arr[0] * $arr[2];
if ($arr[1] == '/')
	$nb = $arr[0] / $arr[2];
if ($arr[1] == '%')
	$nb = $arr[0] % $arr[2];
echo "$nb\n";
?>
