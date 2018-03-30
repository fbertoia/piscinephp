#!/usr/bin/php
<?PHP
function error_message()
{
	echo "Incorrect Parameters\n";
	return (0);
}

$base = "+-*/%";
if ($argc < 2 || $argc > 4)
	return (error_message());
array_shift($argv);
foreach ($argv as $str)
{
	$arr = preg_split('/\s+/', trim($str));
	if ($arr[1])
		return (error_message());
	$ret = array_merge((array)$ret, $arr);
}
if (!is_numeric($ret[0]) || !is_numeric($ret[2]) || ord($ret[1][1]) || strpos($base, $ret[1][0]) === false)
	return (error_message());
if ($ret[1] == '+')
	$nb = $ret[0] + $ret[2];
if ($ret[1] == '-')
	$nb = $ret[0] - $ret[2];
if ($ret[1] == '*')
	$nb = $ret[0] * $ret[2];
if ($ret[1] == '/')
	$nb = $ret[0] / $ret[2];
if ($ret[1] == '%')
	$nb = $ret[0] % $ret[2];
echo "$nb\n";
?>
