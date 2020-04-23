<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM Posts WHERE Id = '$id'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Query didn't work!<br>";
     die( print_r( sqlsrv_errors(), true));
} else

/*$id=sqlsrv_real_escape_string($conn ,$id);
echo "delete".$_DELETE['id'];
echo "post".$_POST['id'];
echo "get".$_GET['id'];*/

?>