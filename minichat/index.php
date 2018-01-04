<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title></title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!--          formulaire d'envoi du pseudo et des messages récupérer sur minichat_post.php par la méthode POST-->
          <form action="minichat_post.php" method="POST" class="myForm">
            <p>
            <div class="col-lg-3 col-lg-offset-3">
              <label for="pseudo">Pseudo : </label>
              <input type="text" class="pseudo"name="pseudo" />
            </div>
            <div class="col-lg-6">
              <label for="message">Votre message : </label>
              <textarea type="text" class="message"  name="message" cols="60" rows="5"></textarea>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-offset-5">
          <button type="submit" name="validate" class="validateButton">Envoyer</button>
        </div>
      </div>
    </p>
  </form>
</div>
<?php
// Connexion à la base de données.
try {
    $bdd = new PDO('mysql:host=localhost;dbname=tutoSQL;charset=utf8', 'root', 'c2004v2307');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération des messages.

$answer = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY  id');

// Affichage de chaque message (protection avec htmlsepcialchars).
while ($datas = $answer->fetch()) {
    ?><p class='col-lg-offset-3'>
      <?php
      echo htmlspecialchars($datas['pseudo']) . ' dit : ' . htmlspecialchars($datas['message']);
  }
  ?>
</p>
<?php
$answer->closeCursor();
?>
</body>
<script src = "https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="projet.js"></script>
</html>

