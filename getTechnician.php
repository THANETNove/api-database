<?php
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


if (isset($_GET)) {
   /*      print_r($_GET); */
	if ($_GET['isAdd'] == 'true') {
		$name = $_GET['name'];
		$result = mysqli_query($link, "SELECT * FROM address LEFT JOIN image_profile ON address.idPhone = image_profile.id_user WHERE  address.technician_1 = '$name' OR address.technician_2 = '$name'");
		if ($result) {
			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;
			}	// while
			echo json_encode($output);
		} //if

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


	mysqli_close($link);
?>