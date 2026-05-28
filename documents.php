<?php include 'db.php';  

if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); }
else 
{
	$user_id = $_SESSION['user_id']  ;}
if(isset($_POST['submit'])){      
$case_id = $_POST['case_id'];     
$document_name = $_POST['document_name'];      $file_name = time() . '_' . $_FILES['file']['name'];      move_uploaded_file(         $_FILES['file']['tmp_name'],         'uploads/' . $file_name     );

      $sql = "INSERT INTO documents(user_id,case_id,         document_name,file_name  ) VALUES('$user_id','$case_id',         '$document_name','$file_name')";      
	  mysqli_query($conn, $sql);      
	  echo "Document Uploaded"; } 
	  ?>


<!DOCTYPE html> 
 <html> 
 <head> 
 <title>Document Upload</title> 
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
<h2 class="text-center">Document Upload</h2>  
<form action="/upload-endpoint" method="post" enctype="multipart/form-data"> 
 <input type="number" name="case_id" class="form-control mb-3" placeholder="Case Id" required> 

<input type="text" name="document_name" class="form-control mb-3" placeholder="Document Name" required> 
  <input type="int" name="file_name" class="form-control mb-3" placeholder="File Name" required> 

 
 <button type="submit" name="upload" class="btn btn-primary w-100"> Upload</button>  
 </form> 
 </div> </div> </div> </div>
 
</body>
</html>