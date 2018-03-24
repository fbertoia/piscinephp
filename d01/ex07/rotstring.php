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
array_shift($argv);
$tmp = preg_split('/ +/', $argv[0]);
$argv[0] = $tmp[0];
array_push($argv, $argv[0]);
array_shift($argv);
print_arr($argv);
?>
