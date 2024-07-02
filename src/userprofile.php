<?php


$username = "";
$password = "";
$get = "";
$b = "";
$d = "";
$r = "";
$g = "";
$d = "";
//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);


if (isset($_POST['val'])) {


    $r = $_POST["no"];
    $g = $_POST["mail"];
    $d = $_POST["num"];
    $sql = "UPDATE `utilisateurs` SET `nom`='$r',`email`='$g',`telephone`=$d WHERE `email`='$g' ";
    $result = mysqli_query($connexion, $sql);

    $nom_utilisateur = $r;
    $email_utilisateur = $g;
    $num_utilisateur = $d;



    if ($result) {

        // Définir une date d'expiration dans le passé
        setcookie("nom_utilisateur", "", time() - 3600, "/");
        setcookie("num_utilisateur", "", time() - 3600, "/");
        setcookie("email_utilisateur", "", time() - 3600, "/");

        // Puis unset pour supprimer la variable
        unset($_COOKIE['nom_utilisateur']);
        unset($_COOKIE['email_utilisateur']);
        unset($_COOKIE['num_utilisateur']);


    }
        setcookie("nom_utilisateur", $nom_utilisateur, time() + (86400 * 30), "/"); // Cookie valable pendant 30 jours
        setcookie("email_utilisateur", $email_utilisateur, time() + (86400 * 30), "/");
        setcookie("num_utilisateur", $num_utilisateur, time() + (86400 * 30), "/");

        // header("location:/immojeune/index.php");
        echo "<script>window.location='userprofile.php'</script>";
        exit;
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/userprofile.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Votre Profil</title>
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


    <div class="profile">
        <h1>Profil</h1>
        <p style="background-color:aqua;width:150px;height:2.5px;margin-top:10px"></p>
        <p style="background-color:aqua;width:75px;height:1.2px;margin-top:5px"></p>
        <div style="display:flex;width: 100%;justify-content:space-between;margin-top:70px">
            <div id="TT">
                <h2 style="margin-bottom:40px">Modifier vos informations</h2>
                <form method="POST">

                    <?php
                    if (isset($_COOKIE['nom_utilisateur']) && isset($_COOKIE['email_utilisateur']) && isset($_COOKIE['num_utilisateur'])) { ?>
                        <div>
                            <label for="">Nom</label>
                            <input type="text" placeholder="Entrer votre nom" name="no" value="<?php echo $_COOKIE['nom_utilisateur'];; ?>">
                        </div>
                        <div>
                            <label for="">E-mail</label>
                            <input type="email" placeholder="Entrer votre E-mail" name="mail" value="<?php echo $_COOKIE['email_utilisateur'];; ?>">
                        </div>
                        <div>
                            <label for="">Numero</label>
                            <input type="number" placeholder="Entrer votre Numero" name="num" value="<?php echo $_COOKIE['num_utilisateur'];; ?>">
                        </div>
                        <div style=" width: 150px;

    height: 7vh;
    border-radius: 0px;
    background-color: rgb(18, 229, 229);
    color: white;
    border: none;
    outline: none;
    display:flex;
    justify-content:center;
    align-items:center">
                            <input type="submit" value="Soumettre" id="yi" name="val">
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div id="YY">
                <img src="../img/téléchargement.jpg" alt="">
                <div style="margin-top:20px;margin-left:-80px;font-size:1.2em">

                    <?php
                    if (isset($_COOKIE['nom_utilisateur']) && isset($_COOKIE['email_utilisateur']) && isset($_COOKIE['num_utilisateur'])) { ?>
                        <p style="margin-bottom:5px;"><strong>Nom:</strong> <?php echo $_COOKIE['nom_utilisateur'];; ?></p>
                        <p style="margin-bottom:5px;"><strong>Email:</strong> <?php echo $_COOKIE['email_utilisateur'];; ?></p>
                        <p><strong>Contact:</strong> <?php echo $_COOKIE['num_utilisateur']; ?></p>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>


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

</body>

</html>