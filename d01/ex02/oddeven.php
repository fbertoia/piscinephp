#!/usr/bin/php
<?PHP
while (printf("Entrez un nombre: ") && $str = fgets(STDIN))
{
	$str = trim(preg_replace('/\n/', '', $str));
	if (is_numeric($str))
		printf("Le chiffre $str est %s\n", $str % 2 ? "Impair" : "Pair");
	else
		printf("'$str' n'est pas un chiffre\n");
}
printf("\n");
?>
