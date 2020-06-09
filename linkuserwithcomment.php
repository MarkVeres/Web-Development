<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$comment_id = $_GET['id'];
$json = file_get_contents('php://input');
$user_id = json_decode($json);

$sql = "UPDATE Comments SET UserId = '$user_id' WHERE Comments.Id = 'comment_id'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Error to retrieve whatever<br>";
     die( print_r( sqlsrv_errors(), true));
}

?>