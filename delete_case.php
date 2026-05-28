<?php
include 'db.php';

$id = $_GET['id'];
	if(!isset($_GET['id'])){
	header("location:cases.php");
exit();
}

mysqli_query(
    $conn,
    "DELETE FROM cases WHERE id='$id'"
);

header("Location: cases.php");
?>
