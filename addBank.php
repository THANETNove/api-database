<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'root', '', "app_tradesman");

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


	
if (isset($_POST)) {
	
	if ($_POST['isAdd'] == 'true') {	
		$id_user = $_POST['id_user'];
		$name = $_POST['name'];
		$number_bank = $_POST['number_bank'];
		$bank = $_POST['bank'];
		print_r("asdas");
		$sql = "INSERT INTO `book_banks`(`id`, `id_user`, `name`, `number_bank`, `bank`) VALUES (Null, '$id_user', '$name','$number_bank','$bank')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			return $result;
		} else {
			return $result;
		}
		
	} else echo "Welcome Master UNG";
   
}
	mysqli_close($link);
?>