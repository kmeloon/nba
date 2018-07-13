<?php
require 'include/mysql-connect.php';

function handleSubmit(&$conn) {
  try {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if (empty($username) || empty($password) ||
      empty($confirm)) {
      throw new Exception('All fields required');
    }
    if ($password !== $confirm) {
      throw new Exception('Passwords do not match');
    }
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $q = "INSERT INTO login(username, password) VALUES
      ('$username', '$hash')";
    $result = $conn->query($q);

    if (!$result) {
      throw new Exception($conn->error);
    }

    header('Location: login.php');
  } catch (Throwable $e) {
    echo '<p style="color:red">' . $e->getMessage() .
      '</p><a href="./register.php">Back</a>';
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  handleSubmit($conn);
}
