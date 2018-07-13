<?php

require 'include/mysql-connect.php';
require 'include/nba.php';

// var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  handleForm($conn);
}

function handleForm($conn) {
  // step 1
  $player = new Player($_POST['name'],$_POST['nickname'],$_POST['yearEntered'],$_POST['yearExit'],
   isset($_POST['mvp']),  isset($_POST['champion']));

  $q = $player->getQuery();
  var_dump($q);
  // step 4
  $result = $conn->query($q);

  if(!$result) {
    return displayMessage($conn->error);
  }

  header('Location: ./');
}

function displayMessage($msg) {
  echo '<p>' . $msg . '</p><a href="nba-form.php">Back</a>';
}
