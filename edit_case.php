<?php
include 'db.php';


	$id = $_GET['id'];
	
	if(!isset($_GET['id'])){
	header("location:cases.php");
exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM cases WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $case_title = $_POST['case_title'];
    $court_name = $_POST['court_name'];
    $case_number = $_POST['case_number'];
    $filing_date = $_POST['filing_date'];
	$next_date = $_POST['next_date'];
	$status = $_POST['status'];
	$description = $_POST['description'];

    $sql = "UPDATE cases SET
            case_title='$case_title',
            court_name='$court_name',
            case_number='$case_number',
            filing_date='$filing_date',
			next_date='$next_date',
			status='$status',
			description='$description'
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    header("Location: cases.php");
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
name="case_title"
value="<?php echo $row['case_title']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="court_name"
value="<?php echo $row['court_name']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="case_number"
value="<?php echo $row['case_number']; ?>"
class="form-control mb-3"
required>

<input type="date"
name="filing_date"
value="<?php echo $row['filing_date']; ?>"
class="form-control mb-3"
required>

<input type="date"
name="next_date"
value="<?php echo $row['next_date']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="status"
value="<?php echo $row['status']; ?>"
class="form-control mb-3"
required>

<input type="text"
name="description"
value="<?php echo $row['description']; ?>"
class="form-control mb-3"
required>

<button type="submit"
name="update"
class="btn btn-primary">
Update case
</button>

</form>

</div> 

</body>
</html>