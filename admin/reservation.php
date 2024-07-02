<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="/immojeune/css/reservation.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<body>

    <nav class="navbar2">
        <a href="" class="logo" style="margin-left: -10px;"><i class='bx bx-aperture'></i>Houzez</a>
        <div class="navlist" style="margin-left: -0px; margin-top:120px">
            <ul style="font-size: 1em;">
                <li><a href="/immojeune/admin/dashbord.php" style="text-decoration: none;"><i class='bx bxs-dashboard' style="margin-left: 5px;"></i> Tableau de bord</a></li>
                <li><a href="/immojeune/admin/logement.php" style="text-decoration: none;"><i class='bx bx-home' style="margin-left: 5px;"></i> Logements</a></li>
                <li><a href="/immojeune/admin/reservation.php" style="text-decoration: none;"><i class='bx bx-cart' style="margin-left: 5px;"></i> Reservations</a></li>
                <li><a href="/immojeune/admin/Ecole.php"  style="text-decoration: none;"><i class='bx bxs-school' style="margin-left: 5px;"></i> Ecoles</a></li>
                <li><a href="/immojeune/admin/profile.php" style="text-decoration: none;"><i class='bx bxs-user-circle' style="margin-left: 5px;"></i> Mon Profil</a></li>
                <li style="margin-top: 180px;"><a href="/immojeune/admin/index.php" style="text-decoration: none;"><i class='bx bx-log-out' style="margin-left: 5px;"></i> Se deconnecter</a></li>

            </ul>

        </div>

    </nav>

    <div class="re">
        <h1 style="color:rgb(5, 46, 67);">Boite de reservation</h1>
        <div style="width: 96.5%; height:4px;background-color:black"></div>
        <h3 style="color: rgb(0, 157, 255);">Reservation(s) en cours </h3>
        <?php


        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_bd = "logements_etudiants";


        $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
        $requete = "SELECT * FROM `reservations`WHERE statuts='En attente' ";

        $b = $connexion->query($requete);

        while ($row = $b->fetch_assoc()) { ?>

            <div class="rc">
                <div>
                    <p id="z" style="justify-content: center; font-weight:700;background:transparent; margin-top:0px;"> <?php echo $row["nomc"]; ?> </p>
                    <p>Adresse</p>
                    <p id="z"> <?php echo $row["adressec"]; ?></p>
                    <p>Duree de location</p>
                    <p id="z"> <?php echo $row["duree de location"]; ?> mois</p>
                    <p>Cout de location </p>
                    <p id="z"> <?php echo $row["cout"]; ?></p>
                    <p>Chambre</p>
                    <p id="z"> <?php echo $row["idlogement"]; ?></p>
                </div>
                <div style="width: 96.5%; justify-content: center;display:flex;">
                    <a href="/immojeune/admin/vreservation.php?id=<?php echo $row["idreservation"]; ?>" style="color:white" id="lo">
                        <button id="a" for="lo"> Louer la chambre</button>
                    </a>

                    <a href="/immojeune/admin/dreservation.php?id=<?php echo $row["idreservation"] ?>" style="color:rgb(5, 46, 67)" id="loo">
                        <button id="b" for="loo" type="submit" > Supprimer la reservation
                        </button>
                    </a>

                </div>

                <div style="width: 66.5%; height:2px;background-color:black; margin:10px 180px"></div>
            </div>
        <?php
        }

        ?>
        <h3 style="color: rgb(0, 157, 255);margin-top:40px">Reservation(s) Validée(s) </h3>

        <?php


        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_bd = "logements_etudiants";


        $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
        $requete = "SELECT * FROM `reservations`WHERE statuts='validé' ";

        $b = $connexion->query($requete);

        while ($row = $b->fetch_assoc()) { ?>

            <div class="rc">
                <div>
                    <p id="z" style="justify-content: center; font-weight:700;background:transparent; margin-top:0px;"> <?php echo $row["nomc"]; ?> </p>
                    <p>Adresse</p>
                    <p id="z"> <?php echo $row["adressec"]; ?></p>
                    <p>Duree de location</p>
                    <p id="z"> <?php echo $row["duree de location"]; ?> mois</p>
                    <p>Cout de location </p>
                    <p id="z"> <?php echo $row["cout"]; ?></p>
                    <p>Chambre</p>
                    <p id="z"> <?php echo $row["idlogement"]; ?></p>
                </div>
                <div style="width: 66.5%; height:2px;background-color:black; margin:10px 180px"></div>
            </div>
        <?php
        }

        ?>
    </div>


</body>



</html>