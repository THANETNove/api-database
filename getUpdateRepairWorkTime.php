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


	
if (isset($_POST)) {
	
	if ($_GET['isAdd'] == true) {	

		$date = date_create();
		$date = date_format($date, 'Y-m-d');
		$dateSub= date("Y-m-d", strtotime("-5 day", strtotime($date)));
		$result = mysqli_query($link, "SELECT  * FROM repairWork  where created_at<'$dateSub' AND idTechnician IS NULL  ORDER BY id DESC");
		if ($result) {
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$output[]=$row;
			}	// while
		}

		if ($output != null) {
			foreach ($output as $value => $item) {
			 $id = $item['id'];
			 
			$sql = "UPDATE repairWork SET  idTechnician='0' WHERE id='$id'";
			$result = mysqli_query($link, $sql);
			}
		
			if ($result) {
				return $result;
			} else {
				return $result;
			}
			  
		}

	} else echo "Welcome Master UNG";
   
}
	mysqli_close($link);
?>