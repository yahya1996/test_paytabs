<?php
$dsn = 'mysql:dbname=u491544553_test_samples;host=localhost';
$user = 'u491544553_test_user';
$password = 'Ayyoub1996@#$';

try
{
	$db = new PDO($dsn,$user,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}

define('PRODUCT_IMG_URL','assets/product-images/');

?>