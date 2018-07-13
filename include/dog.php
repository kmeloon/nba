<?php
class Dog {
  public $id;
  public $name;
  public $breed;
  public $age;
  public $fixed=false;
  public $vaccinated=false;
  public function __construct($dog_name = '',$age=null,
     $isVaccinated = false, $isFixed = false) {
    $this->name = $dog_name;
    $this->age = $age;
    $this->fixed = $isFixed;
    $this->vaccinated = $isVaccinated;
}
   public function hasAllValues()
   {
     return !empty($this->name) && !empty($this->age) && !empty($this->vaccinated) && !empty($this->fixed);

   }
   public function ageIsNumeric() {
     return is_numeric($this->age);
   }


   public function getQuery()
    {
      if ($this->haveDogId()) {
        return "update dogs
      set dog_name = '$this->name',
      age = '$this->age',
      is_fixed = '$this->fixed',
      is_vaccinated= '$this->vaccinated'
      where dog_id = $this->id";
      } else {
        return "insert into dogs (dog_name,age,is_fixed,is_vaccinated)
          values('$this->name', '$this->age',  '$this->fixed','$this->vaccinated')";

      }

     // note the curly braces where we call a method inside the double quotes
   }
   private function fixedAsInt() {
     return $this->fixed ? 1 : 0;
   }
   private function haveDogId() {
     return isset($this->id);
   }
    //add public funciton HasAllValues()
    //Thats why im getting the errors i am.

}
