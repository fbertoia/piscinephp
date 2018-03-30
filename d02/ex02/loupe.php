#!/usr/bin/env php
<?PHP
$rgx1 = '(?<=title=")([^"]*)(?=.*?<\/a)(?!.*?<a)';
$rgx2 = '(?<=>)([^<]*)(?=.*?<\/a)(?!.*?<a)';

function first_level($matches)
{
    $matches[0] = strtoupper($matches[0]);
    return ($matches[0]);
}
$str = file_get_contents('php://stdin');
$arr_match = Array();
$str = preg_replace_callback("/$rgx1/",'first_level', $str);
$str = preg_replace_callback("/$rgx2/",'first_level', $str);
echo $str;
?>
