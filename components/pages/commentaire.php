<meta charset="utf-8" />
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=findacriminal;charset=utf8','root','');
    $commentaires = $bdd->prepare('SELECT * FROM comment ORDER BY idComment DESC');
    $commentaires->execute();

?>
<br />
<h2>Commentaires:</h2>
<form method="POST" action="commentaire.php?action=addComment">
   <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
</form>
<br /><br />
<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : false;
    if($action==="addComment"){
        if(isset($_POST['commentaire'])){
            $commentaire = $bdd->prepare('INSERT INTO comment (idAuthor,content,target) values (1,"'.$_POST['commentaire'].'","azae")');
            $commentaire->execute();
            var_dump($_POST['commentaire']);
            header("Location: http://localhost/FindACriminal/components/pages/commentaire.php");
        }
    }

?>
<?php while($tab = $commentaires->fetch(PDO::FETCH_ASSOC)) { ?>
    <b><?= $tab['content'] ?>:</b><br />
<?php } ?>