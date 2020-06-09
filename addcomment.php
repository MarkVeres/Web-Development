<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$id = $_GET['id'];
$json = file_get_contents('php://input');
$body= json_decode($json);

$sql = "INSERT INTO Comments (CreationDate, PostId, Text) VALUES (2008-09-06, '$id', '$body')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Query didn't work!<br>";
     die( print_r( sqlsrv_errors(), true));
}

?>