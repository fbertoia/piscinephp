<?PHP
function ft_split($str)
{
	$str = trim($str);
	$arr = preg_split('/ +/', $str);
	sort($arr);
	return ($arr);
}
?>
