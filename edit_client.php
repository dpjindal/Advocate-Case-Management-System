<?php
include 'db.php';


	$id = $_GET['id'];
	
	if(!isset($_GET['id'])){
	header("location:clients.php");
exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM clients WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $client_name = $_POST['client_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
	
    $sql = "UPDATE clients SET
            client_name='$client_name',
            mobile='$mobile',
            email='$email',
            address='$address'
					
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    header("Location: clients.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">
 <div align="center">
<?php
include "include/nav.php";
?>
</div>

<h2>Edit Book</h2>

<form method="post">

<input type="text"
name="client_name"
value="<?php echo $row['client_name']; ?>"
class="form-control mb-3"
required>

<input type="tel"
name="mobile"
value="<?php echo $row['mobile']; ?>"
class="form-control mb-3"
required>

<input type="email"
name="email"
value="<?php echo $row['email']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="address"
value="<?php echo $row['address']; ?>"
class="form-control mb-3"
required>



<button type="submit"
name="update"
class="btn btn-primary">
Update Client
</button>

</form>

</div> 

</body>
</html>