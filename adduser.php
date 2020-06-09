<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$json = file_get_contents('php://input');
$name = json_decode($json);

$sql = "INSERT INTO Users (DisplayName, CreationDate, DownVotes, LastAccessDate, Reputation, UpVotes, Views, AboutMe) 
VALUES ('$name', 2008-09-06, 0, 2008-09-06, 0, 0, 0, 'sample text')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Query didn't work!<br>";
     die( print_r( sqlsrv_errors(), true));
}

?>