<?php
class Database {
  protected static $bdd;

  public function __construct () {
  }
  public static function initConnexion() {
    $db_host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "findacriminal";
    $dns = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

    try{
      self::$bdd = new PDO($dns, $user, $password);
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
    }catch(PDOException $e){
      echo $e->getMessage();
    }

  }

}
?>
<?php
  Database::initConnexion();
?>