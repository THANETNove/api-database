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
		$id = $_POST['id'];
		$name = $_POST['name'];
		 $address_user = $_POST['addressUser'];
		$subdistrict = $_POST['subdistrict'];
 		$district = $_POST['district'];
		$province = $_POST['province'];
		$zipcode = $_POST['zipcode'];
		$phone_number = $_POST['phone_number'];
		$location = $_POST['location'];
		$technician_1 = $_POST['technician_1'];
		$technician_2 = $_POST['technician_2']; 
      
		$sql = "UPDATE address SET  name='$name',address='$address_user' , subdistrict='$subdistrict',
        district='$district',province='$province' ,zipcode='$zipcode', phone_number='$phone_number', location='$location' , technician_1='$technician_1',technician_2='$technician_2'
         WHERE id='$id' ";

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