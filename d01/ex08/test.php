#!/usr/bin/php
<?PHP
include("ft_is_sort.php");
array_shift($argv);
if (ft_is_sort($argv))
	echo "Le tableau est trie\n"; else
echo "Le tableau n’est pas trie\n";
?>
