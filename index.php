<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Advocate Diary</title>
    <style>
        .container { max-width: 400px; margin: 50px auto; }
        .btn { padding: 10px 20px; background-color: green; color: white; border: none; cursor: pointer; }
        .btn:hover { background-color: darkgreen; }
    </style>
</head>
<body>
 <div align="center">
<?php
include "include/nav.php";
?>
</div>

    <div class="container">
   
        <h2>Login to Advocate Diary</h2>
        
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email"  required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" class="btn" value="Login">
        </form>
        <br>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
