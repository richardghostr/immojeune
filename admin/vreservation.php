<?php


if (isset($_GET["id"])) {
    $ri = $_COOKIE["id"];
    $id = $_GET["id"];
    $nom_serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_bd = "logements_etudiants";


    $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
    $sql = "UPDATE `reservations` SET `statuts`='validé' WHERE `idreservation`=$id";
   $o= $connexion->query($sql);

if( $o) {
     $requete="UPDATE logements INNER JOIN reservations SET logements.statuts='Occupé',logements.idclient=reservations.idclient WHERE reservations.idreservation=$id AND reservations.idlogement=logements.id AND reservations.statuts='validé'";
    $connexion->query($requete);
}
   
}



header("location:/immojeune/admin/reservation.php");
exit;

?>