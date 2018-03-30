#!/usr/bin/env php
<?PHP
$handle = fopen("/var/run/utmpx", "rb");
$i = 0;
$str = "";
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$str .= $line;
	}
	$i = 0;
	$str = substr($str, 1256);
	while ($str) {
		$array[] = unpack("A256user/A4id/A32line_size/ipid/itype/Itime/L1timebis/a256host/I16other", $str);
		$str = substr($str, 628);
	}
	$tmp = date_default_timezone_set('Europe/Paris');
	foreach ($array as $tmp)
	{
		if ($tmp[type] == 7)
			printf("%s %s  %s\n", $tmp["user"], $tmp["line_size"], strftime("%b %d %H:%M", $tmp["time"]));
	}
}
?>
