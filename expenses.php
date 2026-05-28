<?php 
include 'db.php';  
if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$usr_id = $_SESSION['user_id']  ;}
	
if(isset($_POST['submit'])){      
$case_id = $_POST['case_id'];     
$expense_title = $_POST['expense_title'];     
$amount = $_POST['amount'];     
$expense_date = $_POST['expense_date'];      

$sql = "INSERT INTO expenses(user_id, case_id,         expense_title, amount,expense_date ) VALUES('$user_id','$case_id', '$expense_title',  '$amount',         '$expense_date' )";      
mysqli_query($conn, $sql);      
echo "Expense Added"; } 
?>

<!DOCTYPE html> 
 <html> 
 <head> 
 <title>Expense</title> 
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
<div class="row justify-content-center"> 
<div class="col-md-4">  
<div class="card p-4 shadow">  
<h2 class="text-center">Expenses</h2>  
<form method="post"> 
 <input type="number" name="case_id" class="form-control mb-3" placeholder="Case Id" required> 

<input type="text" name="expense_title" class="form-control mb-3" placeholder="Expense Title" required> 
  <input type="int" name="amount" class="form-control mb-3" placeholder="Amount" required> 

 Expense Date
<input type="date" name="expense_date" class="form-control mb-3" placeholder="Expense Date" required> 
 <button type="submit" name="expense" class="btn btn-primary w-100"> Save Expense</button>  
 </form> 
 </div> </div> </div> </div>
 
</body>
</html>