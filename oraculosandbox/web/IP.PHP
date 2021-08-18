<?PHP

echo gethostbyaddr( $_SERVER['REMOTE_ADDR'] );
echo '<br>';
echo GetHostByName($REMOTE_ADDR);
echo '<br>';
echo php_uname('n');
echo '<br>' ;
echo gethostbyaddr($_SERVER['REMOTE_ADDR']) ;
echo '<br>';
echo gethostbyaddr( GetHostByName($REMOTE_ADDR) );
echo '<br>';
        echo$_SERVER["HTTP_CLIENT_IP"];
echo '<br>';
        echo$_SERVER["HTTP_X_FORWARDED_FOR"];
echo '<br>';
        echo$_SERVER["HTTP_X_FORWARDED"];
echo '<br>';
        echo$_SERVER["HTTP_FORWARDED_FOR"];
echo '<br>';
        echo$_SERVER["HTTP_FORWARDED"];
echo '<br>';
        echo$_SERVER["REMOTE_ADDR"];
echo '<br>';
echo php_uname(); 

echo '<br>';
?>
