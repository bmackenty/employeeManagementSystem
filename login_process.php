<?php 

session_start();
include('database_inc.php');
include('logging_inc.php');

// check if the user is already logged in

// sanitze the input
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$password = $_POST['password'];


// check if the email is in the database
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($mysql_connect, $sql);
if (mysqli_num_rows($result) == 1) {
  // email is in the database
  $row = mysqli_fetch_assoc($result);
    $hash = $row['password'];

  if (password_verify($password, $hash)) {
    // password is correct
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_role'] = $row['role'];
    $_SESSION['user_logged_in'] = true;
    $logger->log('INFORM: '. $email . ' has logged in.');

    header('Location: index.php');
    exit;
  } else {
    // password is incorrect
    $_SESSION['error_login'] = 'Incorrect password';
    $logger->log('WARN: bad password for user ' . $email);
    header('Location: login.php');
    exit;
  }
} else {
  // email is not in the database
  $_SESSION['error_login'] = 'Email not found';
  $logger->log('WARN: login.php - invalid email');
  header('Location: login.php');
  exit;
}


?>
