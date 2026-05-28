<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
$user_id = $_SESSION['user_id'] ;

if(!isset($_SESSION['user_id'])){     
header("Location: index.php"); 
exit();
}

$message = "";


// Insert Client
if (isset($_POST['submit'])) {

    $client_name = trim($_POST['client_name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);

    // Validation
    if ($client_name == "" || $mobile == "") {

        $message = "Please fill required fields";

    } else {

        $sql = "INSERT INTO clients 
                (user_id, client_name, mobile, email, address)
                VALUES 
                (?, ?, ?, ?,?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "issss",
				$user_id,
                $client_name,
                $mobile,
                $email,
                $address
            );

            if ($stmt->execute()) {

                $message = "Client Added Successfully";

            } else {

                $message = "Insert Error : " . $stmt->error;
            }

        } else {

            $message = "Prepare Failed : " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
</head>
<body>
 <div align="center">
<?php
include "include/nav.php";
?>
</div>

<h2>Add Client</h2>

<p style="color:red;">
    <?php echo $message; ?>
</p>

<form method="POST">

    <label>Client Name</label><br>
    <input type="text" name="client_name"><br><br>

    <label>Mobile</label><br>
    <input type="tel" name="mobile"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Address</label><br>
    <textarea name="address"></textarea><br><br>

    <button type="submit" name="submit">
        Save Client
    </button>

</form>

</body>
</html>