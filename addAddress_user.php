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
    print_r($_POST);
	if ($_POST['isAdd'] == 'true') {	
		$idPhone = $_POST['idPhone'];
		$name = $_POST['name'];
		$phone_number = $_POST['phone_number'];
		$address_user = $_POST['addressUser'];
		$subdistrict = $_POST['subdistrict'];
		$district = $_POST['district'];
		$province = $_POST['province'];
		$zipcode = $_POST['zipcode'];
		$location = $_POST['location'];
      
		$sql = "INSERT INTO `address_users`(`id`,`idPhone`, `name`, `phone_number`,`address`, `subdistrict`, `district`, `province`,`zipcode`, `location` ) VALUES (Null, '$idPhone', '$name','$phone_number','$address_user','$subdistrict','$district','$province','$zipcode', '$location')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			
			/* return */echo $result;
		} else {
			/* return */echo $result;
		}
	} else echo "Welcome Master UNG";
   
}
	mysqli_close($link);
?>