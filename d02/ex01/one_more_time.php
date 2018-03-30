#!/usr/bin/env php
<?PHP
function translate_month($str)
{
    if (($ret = preg_replace("/^(j|J)anvier$/", "1", $str)) != 1)
        if (($ret = preg_replace("/^(f|F)evrier$/", "2", $str)) != 2)
            if (($ret = preg_replace("/^(m|M)ars$/", "3", $str)) != 3)
                if (($ret = preg_replace("/^(a|A)vril$/", "4", $str)) != 4)
                    if (($ret = preg_replace("/^(m|M)ai$/", "5", $str)) != 5)
                        if (($ret = preg_replace("/^(j|J)uin$/", "6", $str)) != 6)
                            if (($ret = preg_replace("/^(j|J)uillet$/", "7", $str)) != 7)
                                if (($ret = preg_replace("/^(a|A)out$/", "8", $str)) != 8)
                                    if (($ret = preg_replace("/^(s|S)eptembre$/", "9", $str)) != 9)
                                        if (($ret = preg_replace("/^(O|o)ctobre$/", "10", $str)) != 10)
                                            if (($ret = preg_replace("/^(N|n)ovembre$/", "11", $str)) != 11)
                                                $ret = 12;
    return ($ret);
}

if ($argc < 2)
    return (0);
$sp = "[ ]{1}";
$rgx_day = "/^(?:(?:L|l)undi|(?:M|m)ardi|(?:M|m)ercredi|(?:J|j)eudi|(?:V|v)endredi|(?:S|s)amedi|(?:D|d)imanche)";
$rgx_day_nb = "([1-9]?[1-9]|3[0-1])";
$rgx_mth = "((?:J|j)anvier|(?:F|f)evrier|(?:M|m)ars|(?:A|a)vril|(?:M|m)ai|(?:J|j)uin|(?:J|j)uillet|(?:A|a)out|(?:S|s)eptembre|(?:O|o)ctobre|(?:N|n)ovembre|(?:D|d)ecembre)";
$rgx_yr = "(\d{1,4})";
$rgx_hr = "([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/";
$tmp = date_default_timezone_set('Europe/Paris');

$full_rgx = $rgx_day.$sp.$rgx_day_nb.$sp.$rgx_mth.$sp.$rgx_yr.$sp.$rgx_hr;
if (preg_match($full_rgx, $argv[1], $arr) == 1)
{
    $arr[2] = translate_month($arr[2]);
    $ret = strtotime($arr[1]."-".$arr[2]."-".$arr[3]." ".$arr[4].":".$arr[5].":".$arr[6]);
    printf("%d\n", $ret);
}
else
    printf("Wrong Format\n");
?>
