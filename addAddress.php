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
		$address_user = $_POST['addressUser'];
		$subdistrict = $_POST['subdistrict'];
		$district = $_POST['district'];
		$province = $_POST['province'];
		$zipcode = $_POST['zipcode'];
		$location = $_POST['location'];
        $var = json_decode($location);
		$technician_1 = $_POST['technician_1'];
		$technician_2 = $_POST['technician_2'];
		$technician_3 = $_POST['technician_3']; 
      
		$sql = "INSERT INTO `address`(`id`,`idPhone`, `name`, `address`, `subdistrict`, `district`, `province`,`zipcode`, `location`, `technician_1`, `technician_2`, `technician_3`) VALUES (Null, '$idPhone', '$name','$address_user','$subdistrict','$district','$province','$zipcode','$var','$technician_1','$technician_2','$technician_2')";
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