<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/notifications.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Vos reservations</title>
</head>

<body>

    <div class="first">


        <div class="head">

            <div>
                <h1>Houzez</h1>
            </div>

            <div class="red">
                <div class="headr">

                    <li><a href="/immojeune/index.php">Acceuil</a></li>
                    <li><a href="/immojeune/src/decouvrir.php">Logements</a></li>
                    <li><a href="/immojeune/src/agent.php">Nos agents</a></li>
                    <li><a href="/immojeune/src/contact.php">Contacts</a> </li>
                    <li><a href="/immojeune/src/about.php">A propos</a></li>
                </div>
                <div class="headm">
                    <li class="t"><a href="">en</a></li>
                    <?php
                    if (isset($_COOKIE['nom_utilisateur']) && isset($_COOKIE['email_utilisateur'])) { ?>
                        <details>
                            <summary>
                                <div class="roro" style=" display: flex;
background-color: rgb(255, 213, 0);
border-radius: 30px;
height: 40px;
width: 140px;
justify-content: center;
align-items: center;
font-size: 1.1em;
font-weight: 600;
margin-left: -180px;
margin-top: -10px;
position:absolute;
padding:0 10px;
cursor:pointer;
">
                                    <p href="" style="color:black"><?php echo $_COOKIE['nom_utilisateur'];; ?></p>
                                </div>
                            </summary>

                            <div class="log" style="  position: absolute;
width: 250px;
height: 30vh;
background-color: white;
margin-top:32px;
margin-left:-225px;
border-radius:20px;
display:flex;
flex-direction:column;
justify-content:space-between;
align-items:center;
padding:20px 0;
font-weight: 600;
">
                                <a href="/immojeune/src/notifications.php" style="  position: absolute;
font-size:1.3em;
margin-top:-10px;
margin-left:200px;
color:black;"><i class='bx bxs-bell '></i></a>
                                <p style="background-color:rgb(255, 213, 0);height:80px; width: 250px;margin-top:-20px;border-radius:20px 20px 0 0;display:flex;justify-content:center">
                                    <i class="bx bxs-user-circle bx-tada" style="font-size:4em;position:absolute;z-index:2  ;margin-top:40px;background-color:black;color:aliceblue;border-radius:100%"></i>
                                </p>
                                <p style="margin-top:20px;margin-bottom:-10px"><?php echo $_COOKIE['nom_utilisateur']; ?></p>
                                <p><?php echo $_COOKIE['email_utilisateur']; ?></p>
                                <p> <a href="/immojeune/src/userprofile.php" style="color:rgb(14, 227, 227); display:flex;  align-items:center;"> <i class='bx bxs-edit' style="font-size:1.5em"></i> Edit profile</a></p>
                                <p><a href="/immojeune/src/fin.php" style="color:red;margin-top:-10px; display:flex;  align-items:center;"><i class='bx bx-log-out' style="font-size:1.5em"></i> Se deconnecter</a> </p>

                            </div>
                        </details>
                    <?php
                    } else {
                    ?>
                        <li class="t">|</li>
                        <li><a href="/immojeune/src/login.php" class="login2">Se connecter</a></li>
                        <li class="t">-</li>
                        <li><a href="/immojeune/src/register.php" class="login1">S'inscrire</a></li>
                    <?php
                    }
                    ?>
                </div>

                <div class="btn">
                    <li><a href="">DEPOSER UNE ANNONCE</a></li>
                </div>

            </div>

        </div>
    </div>


    <section class="submit" style="margin-bottom:150px">
        <h1>Reservations</h1>
        <p style="background-color: rgb(18, 229, 229);width:150px;height:2.5px;margin-top:10px"></p>
        <p style="background-color:rgb(18, 229, 229);width:75px;height:1.2px;margin-top:5px"></p>

        <div class="cadre">
            <h2> Vos reservations initiées</h2>
            <div style="background-color: rgb(18, 229, 229);width: 70%;height:2.5px;margin-top:20px;margin-left: 15%;margin-bottom:10px"></div>
            <?php
            $nom_serveur = "localhost";
            $utilisateur = "root";
            $mot_de_passe = "";
            $nom_bd = "logements_etudiants";
            $emp = "";

            $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
            if (isset($_COOKIE["id"])) {
                $id = $_COOKIE["id"];

                $requete = "SELECT * FROM `reservations` WHERE idclient=$id";
                $b = $connexion->query($requete);
                if ($b->num_rows > 0) {
                    while ($row = $b->fetch_assoc()) { ?>

                        <div class="notif">
                            <p>Chambre</p>
                            <p id="rr"><?php echo $row["idlogement"]; ?></p>
                            <p>Duree location</p>
                            <p id="rr"><?php echo $row["duree de location"]; ?></p>
                            <p>Cout de location</p>
                            <p id="rr"><?php echo $row["cout"]; ?></pid>
                            <p style="justify-content:center;display:flex;margin-left: 2%;font-size:1.2em;font-weight:600">statut</p>
                            <p style="justify-content:center;display:flex;font-size:1.4em;font-weight:600;margin-left: 2%;">
                                <?php if ($row["statuts"] == 'validé') { ?>
                                    <label style="color:aqua">Validé</label>
                                    <a href="" style=" height: 6vh;
    border: none;
    background-color: rgb(255, 213, 0);
    color: black;
    border-radius: 20px;
    width: 230px;
    font-weight: 600;
    font-size:0.8em;
    position:absolute;
    margin-left: 1000px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-top:-10px">Proceder au Payement</a>
                                <?php } elseif ($row["statuts"] == 'En attente') { ?>
                                    <label style="color:rgb(255, 213, 0)">En attente</label>
                                    <a href="/immojeune/src/notifications.php?action=delete&id=<?php echo $row["idlogement"]; ?>&duree=<?php echo $row["duree de location"]; ?>&cout=<?php echo $row["cout"]; ?>" style=" height: 6vh;
    border: red 2px solid;
    background-color: white;
    color: red;
    border-radius: 20px;
    width: 230px;
    font-weight: 600;
    font-size:0.8em;
    position:absolute;
    margin-left: 1000px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-top:-10px">Supprimer la reservation</a>
                                <?php   } elseif ($row["statuts"] == 'Annulé') { ?>
                                    <label style="color:red">Refusé</label>
                                <?php }; ?>
                            </p>
                            <div style="background-color: rgb(18, 229, 229);width: 50%;height:1.2px;margin-top:10px;margin-left: 25%;margin-bottom:10px"></div>
                        </div>
                    <?php
                    }
                } else { ?>

                    <P style="font-size:2em ;width:100%;display:flex;justify-content:center; margin-top:30px;color:rgb(72, 65, 65);"> Aucune reservation initiée.....</P>
                <?php
                }
                ?>
            <?php
            }
            ?>

        </div>
    </section>

    <section class="fin">
        <div class="w">
            <h1>Houzez</h1>
            <p style="color: rgb(13, 216, 216);">
                Que vous soyez étudiant à la recherche d’un logement,
                bailleur particulier ou professionnel de l’immobilier souhaitant trouver un locataire,
                Houzez vous accompagne dans toutes les étapes de votre projet de location !</p>
        </div>
        <div class="ww">
            <div id="c">
                <ul>
                    <li>Mentions légales</li>
                    <li>Plan du site</li>
                    <li>Actualités ImmoJeune</li>
                    <li>Partenaires</li>
                </ul>

                <button>CENTRE D'AIDE</button>
            </div>
            <div id="c">
                <h3> ImmoJeune</h3>
                <p>Accueil</p>
                <p>Publier une annonce</p>
                <p>Locataire</p>
                <p>Propriétaire</p>
                <p>Résidence étudiante</p>
            </div>
            <div id="c">
                <h3> Votre logement étudiant</h3>
                <p>Résidence étudiante</p>
                <p>Location étudiant</p>
                <p>Colocation</p>
                <p>Location courte durée</p>
                <p>Location studio</p>
            </div>
            <div id="c" style="width:270px;margin-left:30px">
                <h3> Nos villes coup de coeur</h3>
                <p>Yaoundé</p>
                <p>Douala</p>
                <p>Buea</p>
                <p>Bamenda</p>
            </div>
            <div id="c">
                <h3> Suivez-nous</h3>
                <p>
                    <i class='bx bxl-facebook-circle'></i>
                    <i class='bx bxl-youtube'></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-instagram-alt'></i>

                </p>
            </div>
        </div>
        <div class="www">
            <h4>Houzez © 2023-2024, conçu et fièrement développé au Cameroun.</h4>
        </div>
    </section>


    <?php
    if (isset($_GET["action"]) and isset($_GET["id"]) and isset($_GET["cout"]) and isset($_GET["duree"])) {
        if ($_GET["action"] == "delete" and !empty($_GET["id"]) and !empty($_GET["duree"]) and !empty($_GET["cout"])) {
            $id = $_GET["id"];
            $du = $_GET["duree"];
            $co = $_GET["cout"];
            $idc = $_COOKIE["id"]; ?>

            <form method="POST" id="popupContainer">
                <div id="popup">
                    <h2 style="display:flex;justify-content:center;margin-top:30px">Confirmez-vous la suppression ?</h2>
                    <div style="display:flex;justify-content:center;width: 90%;height:1px ;background-color:whitesmoke;margin-top:20px;margin-left:20px"></div>
                    <P style="display:flex;justify-content:center;margin-top:-20px">Si vous confirmez, votre dossier sera définitivement effacé.</P>
                    <div class="btnPanel">
                        <a href="notifications.php" class='btn btn-danger btn-sm'>Annuler</a>
                        <input type="submit" class='btn btn-primary btn-sm' value="Supprimer" name="supprimer" >
                    </div>
                </div>
            </form>
    <?php
            if (isset($_POST["supprimer"])) {

                //connexion a la base de donnees 
                $nom_serveur = "localhost";
                $utilisateur = "root";
                $mot_de_passe = "";
                $nom_bd = "logements_etudiants";


                $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

                $sql = "DELETE FROM `reservations` WHERE idlogement=$id AND cout=$co AND `duree de location`=$du AND idclient=$idc";
                $res = $connexion->query($sql);

                // header("Refresh :0.1; url=notifications.php?");
                echo "<script>window.location='notifications.php'</script>";
                exit;

            }
        }
    }
    ?>



</body>
</html>