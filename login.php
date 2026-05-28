<?php
session_start();

include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            ";

    $result = mysqli_query($conn, $sql);
	

    if(mysqli_num_rows($result) > 0){
		$row=mysqli_fetch_assoc($result);
		 // Verify Password
        if(password_verify($password, $row['password'])){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];

           // echo "Login Successful";

            // Redirect
             header("Location: dashboard.php");

        }else{
            echo "Wrong Password";
        }

    }else{
        echo "Email Not Found";
    }
}
?>


<!DOCTYPE html>
<html>
<head>

<title>Adv-diary Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
 <div align="center">
<?php
include "include/nav.php";
?>
</div>
<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card p-4 shadow">


<h2 class="text-center">Advocate Diary Login</h2>

<form method="post">

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button type="submit"
name="login"
class="btn btn-primary w-100">
Login
</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>