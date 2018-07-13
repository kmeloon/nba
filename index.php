<style>
body {background-color: powderblue;}
h1   {color: red;font-size: 50; text-shadow: 2px 2px #ff0000; text-align: center;}
p    {color: red;font-size: 30;}
tr {color: red; font-size: 50;}
td{color: black; font-size: 20; text-align: center;padding-left: 50; padding-right: 50;}
table{color:red; border-collapse: collapse; }
td, th { border: 1px solid gray; padding: 10px; }
</style>
<?php
//need to add a header redirect and the header file.
    session_start();
require 'include/mysql-connect.php';
$conn = new mysqli('localhost', 'root', '', 'semesterProjectdb');
$title = 'Lab 8 NBA players Website';
$sql="select * from player";
$q='select * from player order by name';
$result = $conn->query($q);

if (!$result) {
  echo "<p>Error: $conn->error</p>";
}
?>
  <h1><?=$title?></h1>
  <p>
  <?php if(isset($_SESSION['id'])): ?>
    <span>Greetings, <?=$_SESSION['username']?>!</span>
    <a href="nba-form.php">Add new</a>
    <a href="logout.php">Log out</a>
  <?php else: ?>
    <a href="login.php">Log in</a>
    <a href="registration.php">Create account</a>
  <?php endif; ?>
</p>

<table>
  <tr>
    <th>Player Name</th>
    <th>Nickname</th>
    <th>Year Entered</th>
    <th>Year Left</th>
    <th>MVP</th>
    <th>Champion</th>
  </tr>



  <?php foreach($result as $row): ?>
    <tr>

      <td><?=$row['name']?></td>
      <td><?=$row['nickname']?></td>
      <td><?=$row['yearEntered']?></td>
      <td><?=$row['yearExit']?></td>
      <td><?=$row['mvp']? 'Yes' : 'No'?></td>
      <td><?=$row['champion']? 'Yes' : 'No'?></td>


  <td>
  <?php if(isset($_SESSION['id'])): ?>
  <a href="nba-form.php?id=<?=$row['player_id']?>">Edit</a>
  &nbsp;
  <a href="include/delete.php?id=<?=$row['player_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
  </td>

  <?php endif; ?>
  </tr>
<?php endforeach; ?>
</table>
