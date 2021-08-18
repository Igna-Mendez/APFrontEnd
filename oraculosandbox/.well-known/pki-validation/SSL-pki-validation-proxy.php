<?
	$fp = fsockopen("cpanel." . strtolower($_SERVER["INSTANCE_NAME"]), $_SERVER['SERVER_PORT'], $errno, $errstr, 5);
	if (!$fp)
	{
		http_response_code(504);
		exit();
	}

	$request_string = ($_SERVER["REQUEST_METHOD"] . " http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] . "\r\n");

	fwrite($fp, $request_string);
	while (!feof($fp))
	{ 
		$content .= fgets($fp, 128); 
	} 
	fclose($fp); 

	print $content;
?>