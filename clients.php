<?php include 'db.php';  $result = mysqli_query($conn, "SELECT * FROM clients ORDER BY id DESC"); ?>  <!DOCTYPE html> <html> <head> <title>Clients</title> <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet"> </head> 
<body>  
 <div align="center">
<?php
include "include/nav.php";
?>
</div>
<div class="container mt-5">  
<h2>Clients List</h2>  <a href="add_client.php" class="btn btn-success mb-3"> Add Client </a>  <table class="table table-bordered"> <tr> <th>ID</th> <th>Client Name</th> <th>Mobile</th> <th>Email</th><th>Addess</th><th>Action</th> </tr>  <?php while($row=mysqli_fetch_assoc($result)){ ?>  <tr> 
<td><?php echo $row['id']; ?></td> 
<td><?php echo $row['client_name']; ?></td> 
<td><?php echo $row['mobile']; ?></td> 
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['address']; ?></td>
<td>
<a href="edit_client.php?id=<?php echo $row['id']; ?>"
            class="btn btn-warning btn-sm">  Edit </a>

            <a href="delete_client.php?id=<?php echo $row['id']; ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure to delete this book?')">

                Delete

            </a>

        </td> </tr>  <?php } ?>  </table>  </div>  </body> </html>
