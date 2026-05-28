<?php $conn = mysqli_connect(     "localhost",     "root",     "",     "advocate_diary_book project" );  if(!$conn){     die("Database Connection Failed"); } 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>