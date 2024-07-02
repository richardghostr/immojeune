<?php

//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
$requete = "SELECT * FROM `logements`";

$b = $connexion->query($requete);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/decouvrir.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Decouvrir les logements</title>
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
                    <li><a  href="/immojeune/src/about.php">A propos</a></li>
                </div>
                <div class="headm">
                    <li class="t"><a href="">en</a></li>
                    <?php
                   if(isset($_COOKIE['nom_utilisateur']) && isset($_COOKIE['email_utilisateur'])) { ?>
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
color:black;"><i class='bx bxs-bell ' ></i></a>
                                <p style="background-color:rgb(255, 213, 0);height:80px; width: 250px;margin-top:-20px;border-radius:20px 20px 0 0;display:flex;justify-content:center">
                                    <i class="bx bxs-user-circle bx-tada" style="font-size:4em;position:absolute;z-index:2  ;margin-top:40px;background-color:black;color:aliceblue;border-radius:100%"></i>
                                </p>
                                <p style="margin-top:20px;margin-bottom:-10px"><?php echo $_COOKIE['nom_utilisateur']; ?></p>
                                <p><?php echo $_COOKIE['email_utilisateur']; ?></p>
                                <p><a href="/immojeune/src/userprofile.php"  style="color:rgb(14, 227, 227); display:flex;  align-items:center;"> <i class='bx bxs-edit' style="font-size:1.5em"></i> Edit profile</a></p>
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

    <div class="decouvrir">
        <div class="search">
            <form method="POST" class="form">
                <i class='bx bx-search-alt-2'></i>
                <input type="text" name="vy" placeholder="Rechecher par ville ou par ecole" required class="ii">
                <button type="submit" name="okr">RECHERCHER</button>
            </form>
            <button class="id" id='showtl'>Type de logement
                <form class="tl" style="cursor:text" method="POST">
                    <h3>TYPE DE LOGEMENT</h3>
                    <ul>
                        <li><input type="radio" name="tyy" id="q" style="margin-left: -25px" value="Chambre"> <label for="q" style="cursor:pointer">Chambre</label></li>
                        <li><input type="radio" name="tyy" id="ar" style="margin-left:1px" value="Appartement"><label for="ar" style="margin-left:5px ;cursor:pointer">Appartement</label></li>
                        <li><input type="radio" name="tyy" id="st" style="margin-left:-45px" value="Studio"> <label for="st" style="cursor:pointer">Studio</label></li>

                    </ul>
                    <input name="okz" type="submit" id="oi" value="APPLIQUER" style=" color: rgb(18, 229, 229);
    bottom: 15px;
    right: 15px;
    position: absolute;
    font-size: 1.1em;
    background-color:transparent;
    border:none">
                </form>
            </button>

            <button class="id" id='showtl'>Emplacement
                <form class="tl" style="cursor:text" method="POST">
                    <h3>EMPLACEMENT</h3>
                    <ul>
                        <li><input type="radio" name="roo" id="q" style="margin-left: 1px"> <label for="q" style="cursor:pointer">Bafoussam</label></li>
                        <li><input type="radio" name="roo" id="ar" style="margin-left:-16px"><label for="ar" style="margin-left:5px ;cursor:pointer">Yaoundé</label></li>
                        <li><input type="radio" name="roo" id="st" style="margin-left:-28px"> <label for="st" style="cursor:pointer">Douala</label></li>

                    </ul>
                    <a href="">APPLIQUER</a>
                </form>
            </button>

            <button class="id" id="TT">Prix
                <form class="tl" style="cursor:text" method="POST">
                    <h3>PRIX</h3>
                    <ul>
                        <H4 style="margin-top: -5px ;margin-left:-140px;font-weight:500">MIN</H4>
                        <li><input type="number" name="min" id="q" style="margin-left:1px; margin-bottom:10px" required></li>
                        <H4 style="margin-top: -5px ;margin-left:-136px;font-weight:500">MAX</H4>
                        <li><input type="number" name="max" id="ar" style="margin-left:1px" required></li>

                    </ul>

                    <input name="ok" type="submit" id="fd" value="APPLIQUER" style=" color: rgb(18, 229, 229);
    bottom: 15px;
    right: 15px;
    position: absolute;
    font-size: 1.1em;
    background-color:transparent;
    border:none">
                </form>
            </button>
            <button class="id" id="TTT">Surface
                <form class="tl" style="cursor:text" method="POST">
                    <h3>SURFACE</h3>
                    <ul>
                        <H4 style="margin-top: -5px ;margin-left:-140px;font-weight:500">MIN</H4>
                        <li><input type="number" name="mins" id="q" style="margin-left:1px; margin-bottom:10px" required></li>
                        <H4 style="margin-top: -5px ;margin-left:-136px;font-weight:500">MAX</H4>
                        <li><input type="number" name="maxs" id="ar" style="margin-left:1px" required></li>

                    </ul>
                    <input name="okzz" type="submit" value="APPLIQUER" style=" color: rgb(18, 229, 229);
    bottom: 15px;
    right: 15px;
    position: absolute;
    font-size: 1.1em;
    background-color:transparent;
    border:none">
                </form>
            </button>
            <form action="">
                <input type="submit" name="res" value="Reinitialiser" id="opl">
            </form>

        </div>
        <div class="log">
            <div><?php
             $nom_serveur = "localhost";
             $utilisateur = "root";
             $mot_de_passe = "";
             $nom_bd = "logements_etudiants";
             $emp = "";

             $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);


             $requete = "SELECT COUNT(id) As total FROM `logements`";
             $b = $connexion->query($requete);
             $p=$b->fetch_assoc();?>;
             
             <H1><?php  echo $p['total']?> Logements etudiants </H1>
        
                
                <h5 style="font-weight:550 ;">la selection de bien de l'equipe</h5>
            </div>
            <div class="cont">
                <?php
                $nom_serveur = "localhost";
                $utilisateur = "root";
                $mot_de_passe = "";
                $nom_bd = "logements_etudiants";
                $emp = "";

                $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);


                $requete = "SELECT * FROM `logements`";
                $b = $connexion->query($requete);

                if (isset($_POST["ok"])) {
                    $max = $_POST["max"];
                    $min = $_POST["min"];
                    $requete = "SELECT * FROM `logements` WHERE prixmensuel BETWEEN $min AND $max";
                    $b = $connexion->query($requete);
                    $max = "";
                    $min = "";
                }
                if (isset($_POST["okzz"])) {
                    $maxo = $_POST["maxs"];
                    $mino = $_POST["mins"];
                    $requete = "SELECT * FROM `logements` WHERE superficie BETWEEN $mino AND $maxo";
                    $b = $connexion->query($requete);

                    $maxo = "";
                    $mino = "";
                }

                if (isset($_POST['okz'])) {
                    $emp = "";
                    $emp = $_POST['tyy'];
                    $requete = "SELECT * FROM `logements` WHERE `type` LIKE '%{$emp}%'";
                    $b = $connexion->query($requete);

                    $emp = "";
                }

                
                if (isset($_POST['roo'])) {
                    $emp = "";
                    $emp = $_POST['tyy'];
                    $requete = "SELECT * FROM `logements` WHERE `type` LIKE '%{$emp}%'";
                    $b = $connexion->query($requete);

                    $emp = "";
                }


                if (isset($_POST['okr'])) {
                    $emp = "";
                    $emp = $_POST['vy'];
                    $requete = "SELECT DISTINCT (`id`), `idclient`, `statuts`, `prixmensuel`, `prixannuel`, `Images`, `Image2`, `Image3`, `Dateajout`, `Emplacement`, `Description`, `Reservations`, `superficie`, `type` FROM `logements`,`proximite`,`ecoles` WHERE logements.id=proximite.idlogement AND proximite.idecole=ecoles.idecole AND ecoles.abreviation='$emp' OR logements.Emplacement LIKE '{$emp}%';";
                    $b = $connexion->query($requete);

                    $emp = "";
                }

                while ($row = $b->fetch_assoc()) { ?>
                    <div id="cadre">
                        <div class="img1">
                            <img src="<?php echo $row["Images"]; ?>" alt="" style=" width: 102.5%;
    height: 25vh;
    border: none;
    border-radius: 0px;
    margin-bottom: 10px;
    margin-left:-10px">
                        </div>
                        <a href="/immojeune/src/louer.php?id=<?php echo $row["id"]; ?>" class="text" for="op">
                            <div style="margin-top:5px;margin-bottom:5px;font-weight:600"> 
                                 <?php if ($row["statuts"] == 'libre') { ?>
                                    <label for="" style="background-color:  rgb(18, 229, 229);padding:5px;border-radius:5px">
                                    <i class='bx bxs-star' style="margin-bottom: 1px;color:white"></i> 
                                    <label style="color:white"> Libre</label>
                                     </label>
                                <?php   } elseif ($row["statuts"] == 'occupé') { ?>
                                    <label for="" style="background-color:rgb(255, 213, 0);padding:5px;border-radius:5px">
                                    <i class='bx bxs-star' style="margin-bottom: 1px;color:black"></i> 
                                    <label style="color:black">Occupé</label>
                                    </label>
                                <?php }; ?>
                           
                
                        </div>
                            <p style="font-weight: 600; margin-bottom:2px; color:black"> <?php echo $row["type"]; ?></p>
                            <p style="font-size: 0.8em;margin-bottom:0px ;width:100%;color:black"><?php echo $row["Description"]; ?></p>
                            <p style="font-weight: 600; margin:5px 0;color:black"><?php echo $row["superficie"]; ?>m<sup>2</sup> - <?php echo $row["prixmensuel"]; ?>FCFA</p>
                            <p style="font-size: 0.8em;color:black;display:flex;align-items:center;font-weight:600"><i class='bx bx-location-plus' style="font-size: 1.4em;color:black;"></i> <strong><?php echo $row["Emplacement"]; ?></strong></p>
                        </a>
                    </div>
                <?php
                }

                ?>

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
                <i class='bx bxl-youtube' ></i>
                <i class='bx bxl-twitter'></i>
                <i class='bx bxl-instagram-alt' ></i>

                </p>
            </div>
        </div>
        <div class="www">
            <h4>Houzez © 2023-2024, conçu et fièrement développé au Cameroun.</h4>
        </div>
    </section>
    
</body>
<script>
    function sliceText(elem, max){
        let text = elem.textContent;

        if(text.length > max){
            let nText = text.slice(0, max-1);
            return nText+"...";
        }else{
            return text;
        }
    }
    const lines = document.querySelectorAll(".decouvrir .log .cont #cadre a p");

    for(let line of lines){
        line.textContent = sliceText(line, 150);
    }
</script>
</html>