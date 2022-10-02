<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
/* $link = mysqli_connect('localhost', 'root', '', "app_tradesman"); */
$link = mysqli_connect('localhost', 'leavethc_api-appOnline', '12345678', "leavethc_api-appOnline");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}

if(isset($_POST)) {
	if ($_POST['isAdd'] == 'true') {
	print_r($_POST);
	$id = $_POST['id'];
	$name = $_POST['name'];
	 	unlink('images/shop/'.$name);
		$sql = "DELETE FROM image_shop WHERE id=$id";
		$result = mysqli_query($link, $sql);
		if ($result) {
			return "re";
		} else {
			return $result; 
		}
	} else echo "Welcome Master UNG";
}

mysqli_close($link);
 ?>