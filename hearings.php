<?php include 'db.php';  

if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;}
	
if(isset($_POST['hearing'])){      
$case_id = $_POST['case_id'];     
$hearing_date = $_POST['hearing_date'];     $hearing_notes = $_POST['hearing_notes'];     $next_hearing = $_POST['next_hearing']; 
     
$sql = "INSERT INTO hearings(user_id, case_id,         hearing_date, hearing_notes, next_hearing     ) VALUES('$user_id', '$case_id',  '$hearing_date', '$hearing_notes',  '$next_hearing' )";  
    mysqli_query($conn, $sql);      
	mysqli_query($conn,     "UPDATE cases SET next_date='$next_hearing' WHERE id='$case_id'"); } ?>


<!DOCTYPE html> 
 <html> 
 <head> 
 <title>Hearing Date</title> 
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
<h2 class="text-center">Hearing Date</h2>  
<form method="post"> 
<?php
// 2. Fetch data from the table
$query = "SELECT id, case_title FROM cases";
$result = $conn->query($query);

// 3. Generate the HTML select element
echo '<select name="case_id">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['id'] . '">' . $row['case_title'] . '</option>';
}
echo '</select>';
?>
</br>
Hearng Date
<input type="date" name="hearing_date" class="form-control mb-3" placeholder="Hearng Date" required> 
  <input type="text" name="hearing_notes" class="form-control mb-3" placeholder="Hearing Notes" required> 
 Next Hearing
<input type="date" name="next_hearing" class="form-control mb-3" placeholder="Next Hearing Date" required> 
 <button type="submit" name="hearing" class="btn btn-primary w-100"> Save Date</button>  
 </form> 
 </div> </div> </div> </div>
</body>
</html>