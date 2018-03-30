#!/usr/bin/env php
<?PHP
if ($argc < 2)
    return (0);
$argv[1] = trim($argv[1]);
$ret = preg_split("/\s+/", $argv[1]);
$count = count($ret);
$i = 0;
while ($ret[$i])
{
    echo "$ret[$i]";    
    $i++;
    if ($i < $count)
        echo " ";
}
echo "\n";
?>