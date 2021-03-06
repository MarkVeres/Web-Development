<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$sql = "SELECT TOP 5 Posts.Id, Posts.Title, Posts.Body, Users.DisplayName, Posts.AnswerCount FROM Posts
left join Users on Posts.OwnerUserId = Users.Id ORDER BY AnswerCount DESC";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Error to retrieve whatever<br>";
     die( print_r( sqlsrv_errors(), true));
}

include 'post.php';
$posts = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			$posts[] = new Post($row['Id'], $row['Title'], $row['Body'], $row['DisplayName'], $row['AnswerCount']);
        }

header('Content-Type: application/json');
print_r(json_encode($posts));

?>