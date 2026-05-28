<?php
ob_start();
//if (session_status() === PHP_SESSION_NONE) session_start();
// register.php - handles registration and starts trial
require 'db.php';

//require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    


$name = trim($_POST['name'] ?? '');

$email = trim($_POST['email'] ?? '');

$mobile= trim($_POST['mobile'] ?? '');

$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die('Email and password required.');
}


$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user   = $result->fetch_assoc();
if ($user) {
    die('Email already registered. Please login.');
}

$hash = password_hash($password, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (name, email,  mobile,  password) VALUES (?,?,  ?,? )");
$stmt->bind_param("ssis", $name, $email,  $mobile,  $hash);
$stmt->execute();
$user_id = $stmt->insert_id;

// start trial
//start_trial_for_user($user_id);

// set session & redirect
//$_SESSION['user_id'] = $user_id["id"];
header('Location: index.php');
exit;
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jindal Image to Text- Login / Register</title>
    <style>
        body{font-family:Arial; max-width:720px; margin:30px auto;}
        input,button{padding:8px; width:100%; margin:6px 0;}
    </style>
</head>
<body>
 <div align="center">
<?php
include "include/nav.php";
?>
</div>

    <h2>Advocate Diary</h2>
    
    

    
    <h3>Register</h3>
    <form method="post" action="">
     <input name="name" type="text" placeholder="Name" required>
       
       <input name="email" type="email" placeholder="Email" required>
      
      <input name="mobile" type="tel" placeholder="Mobile" required>
     
        <input name="password" type="password" placeholder="Password" required>
        <button type="submit">Create account </button>
    </form>
<a class="btn" href="index.php">If Already Registered- Login</a>
    <hr>

 
    
 
</body>
</html>


