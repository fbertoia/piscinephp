#!/usr/bin/php
<?PHP
function print_arr($arr)
{
	printf("$arr[0]");
	for ($i = 1; $i < count($arr) ; $i++)
		printf(" $arr[$i]");
	printf("\n");
}
if ($argc == 1)
	return (0);
$argv[1] = trim($argv[1]);
$arr = preg_split('/ +/', $argv[1]);
array_push($arr, $arr[0]);
array_shift($arr);
print_arr($arr);
?>
