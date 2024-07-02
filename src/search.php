<?php

$row = "";
$b = "";
$requete = "";
//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";
$max = "";
$min = "";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

if (isset($_POST['okz'])) {
    $emp = $_POST['tyy'];
    $requete = "SELECT * FROM `logements`";
    $b = $connexion->query($requete);
} elseif (isset($_POST["ok"])) {
        $max = $_POST["max"];
        $min = $_POST["min"];
        $requete = "SELECT * FROM `logements` WHERE prixmensuel BETWEEN $min AND $max";
        $b = $connexion->query($requete);
    
} elseif (isset($_POST["okzz"])) {
    $maxo = $_POST["maxs"];
    $mino = $_POST["mins"];
    $requete = "SELECT * FROM `logements` WHERE superficie BETWEEN $mino AND $maxo";
    $b = $connexion->query($requete);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    while ($row = $b->fetch_assoc()) { ?>
        <div id="cadre">
            <div class="img1"></div>
            <a href="/immojeune/louer.php?id=<?php echo $row["id"]; ?>" class="text" for="op">
                <div id="pp"> <i class='bx bxs-star' style="margin-bottom: 1px;"></i> Particulier</div>
                <p style="font-weight: 600; margin-bottom:2px; color:black"> <?php echo $row["type"]; ?></p>
                <p style="font-size: 0.8em;margin-bottom:0px ;width:100%;color:black"><?php echo $row["Description"]; ?></p>
                <p style="font-weight: 600; margin:5px 0;color:black"><?php echo $row["superficie"]; ?>m2 - <?php echo $row["prixmensuel"]; ?>fcfa</p>
                <p style="font-size: 0.8em;color:black"><i class='bx bx-location-plus'></i><?php echo $row["Emplacement"]; ?></p>
            </a>
        </div>
    <?php
    }
    ?>


</body>

</html>