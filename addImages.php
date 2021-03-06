

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("content-type:text/javascript;charset=utf-8");
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
$response = array();
$upload_dir = "images/";
chmod($upload_dir, 0755);
$server_url = 'http://192.168.1.4/project/api-database/';
if(isset($_POST["image"]) || is_uploaded_file($_POST["image"]["tmp_name"]) || $_POST["image"]["error"] = 0)
{
    print_r($_POST);
    $avatar_name = $_POST["image"]["name"];
    $avatar_tmp_name = $_POST["image"]["tmp_name"];
 
        $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        //print_r($upload_name);
        //print_r($avatar_tmp_name);
        if(move_uploaded_file($avatar_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "1File uploaded successfully",
                "url" => $server_url."/".$upload_name
              );
        } else {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "2Error uploading the file!"
            );
        }
} else {
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "3No file was sent!"
    );
}
echo json_encode($response);

?>