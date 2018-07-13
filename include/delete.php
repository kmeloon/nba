<?php
require 'mysql-connect.php';
$id = $_GET['id'];

//deleting the row from table
$q = 'delete from player where player_id =' . $id;
$result = $conn->query($q);
if ($result)
{
  header('Location: ../index.php');
}
else
{
  echo $conn->error;
}
