<?php
include 'db.php';

$id = $_GET['id'];
	if(!isset($_GET['id'])){
	header("location:clients.php");
exit();
}

mysqli_query(
    $conn,
    "DELETE FROM clients WHERE id='$id'"
);

header("Location: clients.php");
?>
