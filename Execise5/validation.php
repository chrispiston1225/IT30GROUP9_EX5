<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];

  $errors = [];

  // Validate username
  if (empty($username)) {
    $errors[] = 'Username is required.';
  } else if (strlen($username) < 5) {
    $errors[] = 'Username must be at least 5 characters.';
  }

  // Validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address.';
  }

  // Validate password
  if (strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters.';
  }

  // Validate gender
  if (empty($gender)) {
    $errors[] = 'Gender is required.';
  }

  // Respond with error messages or success
  if (!empty($errors)) {
    
    echo json_encode([
      'status' => 'error',
      'messages' => $errors
    ]);
  } else {
    
    echo json_encode([
      'status' => 'success',
      'message' => 'Validation Successful!'
    ]);
  }
}
?>