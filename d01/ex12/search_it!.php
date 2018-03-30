#!/usr/bin/env php
<?PHP
if ($argc < 3)
    return (0);
$arr = Array();
$i = 2;
while ($i < $argc )
{
    $ret = explode(':', $argv[$i]);
    $arr[$ret[0]] = $ret[1];
    $i++;
}
if ($arr[$argv[1]])
    printf("%s\n", $arr[$argv[1]]);
?>
