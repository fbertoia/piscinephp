#!/usr/bin/env php
<?PHP

function create_jpg($argv, $path_dir, $jpg_url, $ch)
{
	$jpg_name_file = preg_replace("_(^.*\/)_" ,"", $jpg_url);
	$jpg_name_file = $path_dir.'/'.$jpg_name_file;
	if (preg_match("_(!^(https?://|www\.|https?://www\.))_", $jpg_url, $log) === 0)
		$absolute_path_jpg = $argv.$jpg_url;
    curl_setopt($ch,CURLOPT_URL,$absolute_path_jpg);
    if (($result = curl_exec($ch)) === FALSE)
		return (true);
	$savefile = fopen("$jpg_name_file", 'w');
	fwrite($savefile, $result);
	fclose($savefile);
	return (true);
}

if ($argc < 2)
	return (0);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
if (($output = curl_exec($ch)) !== FALSE)
{
	$res = Array();
	preg_match_all('_(?:<img[^>]*src="([^"]*)")_', $output, $res);
	$path_dir = preg_replace("_(https?:\/\/)_" ,"", $argv[1]);
	$path_dir = preg_replace("_(\/.*$)_" ,"", $path_dir);
	if (file_exists($path_dir) || mkdir($path_dir, 0700))
	{
		foreach($res[1] as $str)
		{
			if (create_jpg($argv[1], $path_dir, $str, $ch) === FALSE)
				break;
		}
	}
}
curl_close($ch);
?>
