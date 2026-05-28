<?php 
include 'db.php';
if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;}  
$result = mysqli_query( $conn, "SELECT * FROM cases WHERE next_date = CURDATE() AND user_id = '$user_id'ORDER BY 'court_name'" ); ?> 
 <!DOCTYPE html> <html> 
 <head> 
 <title>Today's Hearings</title> 
 <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet"> 
</head> 
<body> 
 <div class="container mt-5">  
  <div align="center">
<?php
include "include/nav.php";
?>
</div>
 <h2>Today's Hearings</h2>  <table class="table table-bordered"> <tr> <th>Case Title</th> <th>Court</th> <th>Next Date</th> </tr>  <?php while($row=mysqli_fetch_assoc($result)){ ?>  <tr> <td><?php echo $row['case_title']; ?></td> <td><?php echo $row['court_name']; ?></td> <td><?php echo $row['next_date']; ?></td> </tr>  <?php } ?>  </table> </div> </div> </div> </div>
 </body> 
 </html>
