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


if (isset($_GET)) {


	if ($_GET['isAdd'] == 'true') {
        $id_user = $_GET['id_user'];
        $id_tech = $_GET['id_tech'];
        $result = mysqli_query($link, "SELECT image_profile.id_user,image_profile.file_src,message.idUser,message.id_technician,
		message.message, message.status_read,  message.status_user, message.created_at, message.id
		FROM message  LEFT JOIN image_profile ON message.idUser = image_profile.id_user WHERE message.idUser='$id_user' AND message.id_technician='$id_tech'  LIMIT 50");
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