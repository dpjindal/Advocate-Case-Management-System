<?php include 'db.php';  $sql = "SELECT cases.*, clients.client_name FROM cases INNER JOIN clients ON cases.client_id = clients.id ORDER BY cases.id DESC";  $result = mysqli_query($conn, $sql); ?>  

<!DOCTYPE html> <html> <head> <title>Cases</title> <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet"> </head> 
<body>  
 <div align="center">
<?php
include "include/nav.php";
?>
</div>
<div class="container mt-5">  <h2>Cases List</h2>  <table class="table table-bordered"> <tr> <th>Client</th> <th>Case Title</th> <th>Court</th> <th>Case Number</th> <th>Next Date</th> <th>Status</th> <th>Action</th></tr>  <?php while($row=mysqli_fetch_assoc($result)){ ?>  <tr> <td><?php echo $row['client_name']; ?></td> <td><?php echo $row['case_title']; ?></td> <td><?php echo $row['court_name']; ?></td> <td><?php echo $row['case_number']; ?></td> <td><?php echo $row['next_date']; ?></td> <td><?php echo $row['status']; ?></td> 
<td><a href="edit_case.php?id=<?php echo $row['id']; ?>"
            class="btn btn-warning btn-sm">  Edit </a>

            <a href="delete_case.php?id=<?php echo $row['id']; ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure to delete this book?')">

                Delete

            </a>

        </td></tr>  <?php } ?>  </table> 
  </div>  </body> </html>
