<?php

// Connexion à la base de données.
try {
    $bdd = new PDO('mysql:host=localhost;dbname=tutoSQL;charset=utf8', 'root', 'c2004v2307');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$requestMessage = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$requestMessage->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection de l'utilisateur sur la page avec le formulaire (index.php).
header('Location: index.php');
?>