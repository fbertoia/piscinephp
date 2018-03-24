<?PHP
function ft_split($str)
{
	$arr = explode(' ', $str);
	sort($arr);
	return ($arr);
}
?>
