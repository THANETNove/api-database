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


 $file = time(). "_" . basename($_FILES['image']['name']);

 $tmp_name = $_FILES['image']['tmp_name'];
 $id_name = $_POST['id_user'];
 $nameImage = $_POST['nameImage'];
 
if(move_uploaded_file($tmp_name,"images/shop/".$file)){

    $sql = "INSERT INTO `image_shop`(`id`,`id_user`, `url_shop`,`nameImage`) VALUES (Null,'$id_name', '$file','$nameImage')";
    $result = mysqli_query($link, $sql);
    if ($result) {
        
        /* return */echo $result;
    } else {
        /* return */echo $result;
    }
  echo json_encode([
    "Message" => "The file has been uploaded",
    "Status" => "OK"
    ]);
}else{
  echo json_encode([
    "Message" => "sorry",
    "Status" => "Error"
    ]);
}

mysqli_close($link);
 ?>