<?php
$username = "";
$password = "";
$get = "";
$b = "";
$row="";


//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM `logements` WHERE Description LIKE '{$input}%'";
    $result = mysqli_query($connexion, $sql);
    

    if (mysqli_num_rows($result) > 0) { ?>

        <div >
            <?php

            while ($row = $result->fetch_assoc()) { ?>

                <div style="width: 100%;">
                    <p> <?php echo $row["type"] ;?> <label style="color: rgb(60, 127, 172);"><?php echo $row["id"] ;?></label></p>
                    <p style="font-size:0.9em"><?php echo $row["Description"] ;?></p>
                    <p style="height:0.5px;background-color:black;width:200px;margin-bottom: -1px;"></p>
                </div>
            <?php
            }
            ?>

    <?php } else {
        echo "NO DATA FOUND";
    }
}



if (isset($_POST['inputv'])) {
    $input = $_POST['inputv'];
    $sql = "SELECT * FROM `logements` WHERE Emplacement LIKE '{$input}%'";
    $result = mysqli_query($connexion, $sql);
    

    if (mysqli_num_rows($result) > 0) { ?>

        <div >
            <?php

            while ($row = $result->fetch_assoc()) { ?>

                <div style="width: 100%;">
                    <p> <?php echo $row["type"] ;?> <label style="color: rgb(60, 127, 172);"><?php echo $row["id"] ;?></label></p>
                    <p style="font-size:0.9em"><?php echo $row["Emplacement"] ;?></p>
                    <p style="height:0.5px;background-color:black;width:200px;margin-bottom: -1px;"></p>
                </div>
            <?php
            }
            ?>

    <?php } else {
        echo "NO DATA FOUND";
    }
}




if (isset($_POST['inputr'])) {
    $input = $_POST['inputr'];
    $sql = "SELECT * FROM `logements` WHERE Dateajout ='{$input}'";
    $result = mysqli_query($connexion, $sql);
    

    if (mysqli_num_rows($result) > 0) { ?>

        <div >
            <?php

            while ($row = $result->fetch_assoc()) { ?>

                <div style="width: 100%;">
                    <p><?php echo $row["type"] ;?> <label style="color: rgb(60, 127, 172);"><?php echo $row["id"] ;?></label></p>
                    <p style="font-size:0.9em"><?php echo $row["Dateajout"] ;?></p>
                    <p style="height:0.5px;background-color:black;width:200px;margin-bottom: -1px;"></p>
                </div>
            <?php
            }
            ?>

    <?php } else {
        echo "NO DATA FOUND";
    }
}

    ?>