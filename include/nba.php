<?php
class Player {
  public $id;
  public $name;
  public $nickname;
  public $yearEntered;
  public $yearExit;
  public $MVP=false;
  public $champion=false;
  public function __construct($name='',$nickname='',$yearEntered=null,$yearExit=null,
     $MVP = false, $champion = false) {
    $this->name = $name;
    $this->nickname=$nickname;
    $this->yearEntered = $yearEntered;
    $this->yearExit = $yearExit;
    $this->MVP=$MVP;
    $this->champion=$champion;
}
   public function hasAllValues()
   {
     return !empty($this->name) && !empty($this->nickname) && !empty($this->yearEntered) && !empty($this->yearExit) && !empty($this->MVP) && !empty($this->champion);

   }
   public function yearIsNumeric() {
     return is_numeric($this->yearEntered);
   }


   public function getQuery()
    {
      if ($this->havePlayerId()) {
        return "update player
      set name = '$this->name',
      nickname='$this->nickname',
      yearEntered = '$this->yearEntered',
      yearExit= '$this->yearExit',
      mvp='$this->MVP',
      champion='$this->champion'
      where player_id = $this->id";
      } else {
        return "insert into player (name,nickname,yearEntered,yearExit,MVP,champion)
          values('$this->name','$this->nickname','$this->yearEntered','$this->yearExit','$this->MVP','$this->champion')";

      }

     // note the curly braces where we call a method inside the double quotes
   }
   private function mvpAsInt() {
     return $this->fixed ? 1 : 0;
   }
   private function havePlayerId() {
     return isset($this->id);
   }
    //add public funciton HasAllValues()
    //Thats why im getting the errors i am.

}
