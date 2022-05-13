<?php
include_once "../../database.php";
class ModeleHomepage extends Database
{
  private $homepage;
  function __construct() {
  }
  public function getPublications(){
    try{
      $response = self::$bdd->prepare('SELECT * FROM user');
      $response->exectute();
      if(($tab = $reponse->fetch(PDO::FETCH_ASSOC)) !== false) {
        var_dump($tab);
        echo"aaa";
      }
      echo"aaa";
      var_dump($tab);
    }catch(PDOException $p){
      echo("publication introuvable");
    }
  }
}
?>