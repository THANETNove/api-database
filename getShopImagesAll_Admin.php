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
		$result = mysqli_query($link, "SELECT 
        shop.id,shop.id_shop,shop.heading,shop.detail,shop.status,
        image_shop.id_user,image_shop.url_shop,image_shop.url_shop FROM shop 
        LEFT JOIN image_shop ON shop.id_shop = image_shop.id_user  
		WHERE shop.status IS NULL GROUP BY shop.id" );
		if ($result) {
			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;
			}	// while
			echo json_encode($output);
		}else{
			echo 'null'; 
		}

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


	mysqli_close($link);
?>