<?php 
include 'db.php';  
if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;}
if(isset($_POST['add_case'])){      
$client_id = $_POST['client_id'];     
$case_title = $_POST['case_title'];     
$court_name = $_POST['court_name'];     
$case_number = $_POST['case_number'];     
$filing_date = $_POST['filing_date'];     
$next_date = $_POST['next_date'];     
$status = $_POST['status'];     
$description = $_POST['description'];      

$sql = "INSERT INTO cases( user_id, client_id,         case_title, court_name, case_number,         filing_date, next_date,status, description  ) VALUES('$user_id', '$client_id',         '$case_title','$court_name', '$case_number',         '$filing_date','$next_date', '$status',         '$description' )";      
mysqli_query($conn, $sql);       
echo "Case Added Successfully"; }  
//$clients = mysqli_query($conn, "SELECT * FROM clients"); ?>

 <!DOCTYPE html> 
 <html> 
 <head> 
 <title>Advocate Login</title> 
 <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet"> </head> 
<body>  

<div class="container mt-5">
 <div align="center">
<?php
include "include/nav.php";
?>
</div> <div class="row justify-content-center"> <div class="col-md-4">  <div class="card p-4 shadow">  <h2 class="text-center">Add Case</h2>  
<form method="post">
<?php
// 2. Fetch data from the table
$query = "SELECT id, client_name FROM clients";
$result = $conn->query($query);

// 3. Generate the HTML select element
echo '<select name="client_id">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['id'] . '">' . $row['client_name'] . '</option>';
}
echo '</select>';
?>

 <input type="text" name="case_title" class="form-control mb-3" placeholder="Case Title" required>
 <input type="text" name="court_name" class="form-control mb-3" placeholder="Court Name" required >
 <input type="text" name="case_number" class="form-control mb-3" placeholder="Case Number" required> 
 Filing Date
 <input type="date" name="filing_date" class="form-control mb-3" placeholder="Filing Date" required>
 Next Date
 <input type="date" name="next_date" class="form-control mb-3" placeholder="Next Date" required> 
 <input type="text" name="status" class="form-control mb-3" placeholder="Status" required>
 <input type="text" name="description" class="form-control mb-3" placeholder="Description" required>
      
 <button type="submit" name="add_case" class="btn btn-primary w-100"> Add Case</button>  </form>  
 </div> </div> </div> </div>  
 </body> 
 </html>
