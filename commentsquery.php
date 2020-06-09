<?php
$serverName = "DELUX-PC\\SQLEXPRESS";
$connectionInfo = array( "Database"=>"StackOverflow2010");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$error = "connection failed: ";
if ($conn->connect_error) {
   die($error . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT Comments.Id, Comments.Text, Users.DisplayName FROM Comments
left join Users on Comments.UserId = Users.Id
WHERE Comments.PostId = '$id'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false ) {
	 echo "Error to retrieve whatever<br>";
     die( print_r( sqlsrv_errors(), true));
}

include 'comments.php';
$data = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			$data[] = new Comments($row['Text'], $row['DisplayName'],$row['Id']);
        }

header('Content-Type: application/json');
print_r(json_encode($data));

?>