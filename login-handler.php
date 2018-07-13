<?php
require 'include/mysql-connect.php';

function handleSubmit(&$conn) {
  try {
    // get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
      throw new Exception('All fields required');
    }
    $q = "SELECT * FROM login WHERE username = '$username'";
    $result = $conn->query($q);
    if (!$result) {
      throw new Exception($conn->error);
    }
    $user = $result->fetch_object();
    if (!$user || !password_verify($password, $user->password)) {
      throw new Exception('Invalid username or password');
    }

    session_start();
    $_SESSION = [
      'id' => $user->id,
      'username' => $user->username,
    ];

    header('Location: ./');
    // else, display error
  } catch (Throwable $e) {
    echo '<p style="color:red">' . $e->getMessage() .
      '</p><a href="./login.php">Back</a>';
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  handleSubmit($conn);
}
