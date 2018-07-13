<?php
//Now when i click edit, it actually popualates with proper information based on Id.

require 'include/mysql-connect.php';
require 'include/nba.php';
$id = $_GET['id'] ?? null;
$name = $conn->query('select name from player');
if ($id) {
  $q = 'select * from player where player_id = ' . $id;
  $result = $conn->query($q);
  $row = $result->fetch_assoc();
  $player = new Player( $row['name'], $row['nickname'], $row['yearEntered'], $row['yearExit'], $row['mvp'], $row['champion']);
} else {
  $player = new Player();
}
?>
<p><a href="./">Back</a></p>
<form action="form-handler.php" method="post">
  <fieldset>
    <legend>NBA Form</legend>
    <input type="hidden" value="<?=$player->id?>" name="palyer_id">
    <label>
      Player Name:
      <input type="text" name="name" value="<?=$player->name?>">
    </label>
    <label>
      Nickname:
      <input type="text" name="nickname" value="<?=$player->nickname?>">
    </label>
    <label>
      Year Entered:
      <input type="text" name="yearEntered" value="<?=$player->yearEntered?>">
    </label>
    <label>
      Year Exit:
      <input type="text" name="yearExit" value="<?=$player->yearExit?>">
    </label>

    <label>
      <input type="checkbox" name="mvp" <?=$player->MVP ? 'checked' : ''?>>Was player MVP?
    </label>
    <label>
      <input type="checkbox" name="champion" <?=$player->champion ? 'checked' : ''?>>Was player Champion?
    </label>

  <button type="submit">Save</button>
