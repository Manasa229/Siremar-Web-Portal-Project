<?php 
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include './connection.php';

$data = json_decode((file_get_contents("php://input")));
$table_name=$data->table_name;
$id=$data->id;

$conn = get_db_connection();

$sql = "DELETE FROM $table_name WHERE id=$id";

if($conn->query($sql) === true) {
    $response['message'] = 'success';
    echo json_encode($response);
} else {
    {echo "Error creating table: " . $conn->error;}
    $response['message'] = 'failed';
    echo json_encode($response);
}


?>