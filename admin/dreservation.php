<?php


if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $nom_serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_bd = "logements_etudiants";


    $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
    $sql = "UPDATE `reservations` SET `statuts`='Annulé' WHERE `idreservation`=$id";
    $connexion->query($sql);

}


  
      header("location:/immojeune/admin/reservation.php");
      exit;


?>