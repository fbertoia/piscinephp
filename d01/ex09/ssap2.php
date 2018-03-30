#!/usr/bin/php
<?PHP
function sort_ex($str1, $str2)
{
	$str_a = $str1;
	$str_b = $str2;
	$str_a = strtolower($str_a);
	$str_b = strtolower($str_b);
	$base = "abcdefghijklmnopqrstuvwxyz0123456789";
	for ($i = 0; $str_a[$i] && $str_b[$i] ; $i++)
	{
		if ($str_a[$i] != $str_b[$i])
		{
			if (($ret1 = strpos($base, $str_a[$i])) === FALSE)
				(int)$ret1 = ord((int)$str_a[$i]) + 40;
			if (($ret2 = strpos($base, $str_b[$i])) === FALSE)
				(int)$ret2 = ord($str_b[$i]) + 40;
			return ($ret1 - $ret2);
		}
	}
	return (ord($str_a[$i]) - ord($str_b[$i]));
}

if ($argc == 1)
	return (0);
$i = 1;
while ($i < count($argv))
{
	$argv[$i] = trim($argv[$i]);
	$arr = preg_split('/ +/', $argv[$i]);
	$ret = array_merge((array)$ret, $arr);
	$i++;
}
usort($ret, 'sort_ex');
for ($i = 0; $i < count($ret) ; $i++)
		printf("$ret[$i]\n");
?>
