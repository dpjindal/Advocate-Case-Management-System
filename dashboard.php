<?php session_start(); 
include 'db.php';  
if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;}
	
$totalClients = mysqli_num_rows(     
mysqli_query($conn, "SELECT id FROM clients WHERE user_id ='$user_id'") );  $totalCases = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM cases WHERE user_id ='$user_id'") );  
$totalHearings = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM hearings WHERE user_id ='$user_id'") ); 
?>  

<!DOCTYPE html> <html> <head> <title>Dashboard</title> <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet"> </head> <body>  <div class="container mt-5">
 <div align="center">
<?php
include "include/nav.php";
?>
</div>
  <h1>Advocate Diary Dashboard</h1>  <div class="row mt-4">  <div class="col-md-4"> <div class="card p-4 bg-primary text-white"> 
<h3>Total Clients</h3> 
<h1><?php echo $totalClients; ?></h1> </div> </div>
  <div class="col-md-4"> <div class="card p-4 bg-success text-white"> 
  <h3>Total Cases</h3> 
  <h1><?php echo $totalCases; ?></h1> </div> </div>
    <div class="col-md-4"> <div class="card p-4 bg-danger text-white"> 
    <h3>Total Hearings</h3> <h1><?php echo $totalHearings; ?></h1> </div> </div>  </div>  
 </div>  </body> </html>
