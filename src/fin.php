<?php  

// Définir une date d'expiration dans le passé
setcookie("nom_utilisateur", "", time() - 3600, "/");
setcookie("num_utilisateur", "", time() - 3600, "/");
setcookie("email_utilisateur", "", time() - 3600, "/");
setcookie("id", "", time() - 3600, "/");

// Puis unset pour supprimer la variable
unset($_COOKIE['nom_utilisateur']);
unset($_COOKIE['email_utilisateur']);
unset($_COOKIE['num_utilisateur']);
unset($_COOKIE['id']);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

?>