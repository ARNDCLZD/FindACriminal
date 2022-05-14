<meta charset="utf-8" />
<?php
    
    $bdd = new PDO('mysql:host=localhost;dbname=findacriminal;charset=utf8','root','');
    $commentaires = $bdd->prepare('SELECT * FROM comment ORDER BY idComment DESC');
    $commentaires->execute();

?>
<br />
<h2>Commentaires:</h2>
<?php
    $fraudster = isset($_GET["fraudster"]) ? $_GET["fraudster"] : false;
    echo '  <form method="POST" action="index.php?action=addComment&fraudster='.$fraudster.'">
                <textarea class="test" cols="205" name="commentaire" placeholder="Votre commentaire..."></textarea><br />
                <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
            </form>'
        
?>
<br /><br />
<?php
    $fraudster = isset($_GET["fraudster"]) ? $_GET["fraudster"] : false;
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "random dude";
    $action = isset($_GET["action"]) ? $_GET["action"] : false;
    if($action==="addComment"){
        if(isset($_POST['commentaire']) && $fraudster){
            $commentaire = $bdd->prepare('INSERT INTO comment (idAuthor,content,target) values ("'.$username.'","'.$_POST['commentaire'].'","'.$fraudster.'")');
            $commentaire->execute();
            header("Location: http://localhost/FindACriminal/index.php?fraudster=".$fraudster);
        }
    }

?>
<?php
    $fraudster = isset($_GET["fraudster"]) ? $_GET["fraudster"] : false;
    while($tab = $commentaires->fetch(PDO::FETCH_ASSOC)) { 
        if($tab['target']==$fraudster)
            echo "<b>".$tab['idAuthor']." : </b>".$tab['content']."<br>";
    } 
?>

<style>
    .test {
        resize:none;
    }
    .div {
        background-color: #dc3545;
        color: #fec007;
    }
</style>