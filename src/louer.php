<?php

$no = "";
$ad = "";
$em = "";
$si = "";
$pn = "";
$sa = "";
$sr = "";
$da = "";
$du = "";
$dr = "";
$r = "";
$successMessage = "";
$st = "";
$cout = "";
$row = "";
$id = "";
$cc = "";


$result1 = "";



if (isset($_COOKIE['nom_utilisateur']) && isset($_COOKIE['email_utilisateur'])) {
    $rr = $_COOKIE["id"];
    $mail = $_COOKIE["email_utilisateur"];
}

//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

if (!isset($_GET["id"])) {
    header("location: /immojeune/admin/logement.php");
    exit;
} else {

    $id = $_GET["id"];
    $sql = "SELECT * FROM logements WHERE id=$id";
    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($result);
    $cc = intval($row["prixmensuel"]);

    $id = $_GET["id"];
    $sqli = "SELECT (MONTH(Dateajout)-MONTH(CURRENT_DATE)) AS nb FROM logements WHERE id=$id;";
    $resulti = mysqli_query($connexion, $sqli);
    $rowulti = mysqli_fetch_assoc($resulti);

    if (isset($_POST["candidater"])) {
        if (!isset($_COOKIE['nom_utilisateur']) && !isset($_COOKIE['email_utilisateur'])) { ?>

            <form method="post" id="popupContainer">
                <div id="popup">
                    <h2 style="display:flex;justify-content:center;margin-top:30px">Vous n'avez pas compte !</h2>
                    <div style="display:flex;justify-content:center;width: 90%;height:1px ;background-color:whitesmoke;margin-top:20px;margin-left:20px"></div>
                    <P style="display:flex;justify-content:center;margin-top:-20px">Connecter vous pour proceder a la reservation !</P>
                    <div class="btnPanel">
                        <a href="" class='btn btn-danger btn-sm'>Annuler</a>
                        <a href="login.php" class='btn btn-primary btn-sm'>Se connecter</a>
                    </div>
                </div>
            </form>

            <?php } else {
            $no = $_POST['NO'];
            $ad = $_POST['AD'];
            $em = $_POST['EM'];
            $si = $_POST['SI'];
            $pn = $_POST['PN'];
            $sa = $_POST['SA'];
            $sr = $_POST['SR'];
            $da = $_POST['DA'];
            $du = $_POST['DU'];

            $r =  $sa + $sr;

            $cout = $cc * intval($du);

            // do {
            if (empty($no) || empty($ad) || empty($em) || empty($si) || empty($pn) || empty($sa) || empty($sr) || empty($da) || empty($du)) {
                $errorMessage = "All the fiels are required";
            } else {
                $insert = "INSERT INTO `reservations`(`idlogement`,`idclient`, `nomc`, `adressec`, `numeroc`, `situationc`, `salaire`, `date`, `duree de location`,`cout`,`dateR`) VALUES ( $id,$rr,'$no','$ad',$pn,'$si',$r,'$da','$du','$cout',CURDATE())";
                $b = $connexion->query($insert);


                $no = "";
                $ad = "";
                $em = "";
                $si = "";
                $pn = "";
                $sa = "";
                $sr = "";
                $da = "";
                $du = "";

                if ($b) {
                    $sql = "UPDATE `logements` SET Reservations = Reservations+1 WHERE id=$id;";
                    $result = $connexion->query($sql);
                } ?>

                <form method="POST" id="popupContainer">
                    <div id="popup">
                        <h2 style="display:flex;justify-content:center;margin-top:30px">Reservation Initiée avec succes !</h2>
                        <div style="display:flex;justify-content:center;width: 90%;height:1px ;background-color:whitesmoke;margin-top:20px;margin-left:20px"></div>
                        <P style="display:flex;justify-content:center;margin-top:-25px;text-align:center;margin-left:40px;margin-right:40px">Veuillez consulter votre boite de resevation pour voir l'etat de votre reservation</P>
                        <div class="btnPanel">
                            <a href="/immojeune/src/decouvrir.php" class='btn btn-danger btn-sm' style="color:aqua;background-color:white;border:2px solid aqua">Retour</a>
                            <a type="submit" href="/immojeune/src/notifications.php" class='btn btn-primary btn-sm' style="padding: 16px 30px;">Consulter</a>
                        </div>
                    </div>
                </form>
<?php

                if (isset($_POST["Suivant"])) {
                    header("location:/immojeune/src/decouvrir.php");
                    exit;
                }
            }
            // } while (true);
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/louer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Louer un logement</title>
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

                                <a href="" style="  position: absolute;
font-size:1.3em;
margin-top:-10px;
margin-left:200px;
color:black;"><i class='bx bxs-bell '></i></a>
                                <p style="background-color:rgb(255, 213, 0);height:80px; width: 250px;margin-top:-20px;border-radius:20px 20px 0 0;display:flex;justify-content:center">
                                    <i class="bx bxs-user-circle bx-tada" style="font-size:4em;position:absolute;z-index:2  ;margin-top:40px;background-color:black;color:aliceblue;border-radius:100%"></i>
                                </p>
                                <p style="margin-top:20px;margin-bottom:-10px"><?php echo $_COOKIE['nom_utilisateur']; ?></p>
                                <p><?php echo $_COOKIE['email_utilisateur']; ?></p>
                                <p><a href="/immojeune/src/userprofile.php" style="color:rgb(14, 227, 227); display:flex;  align-items:center;"> <i class='bx bxs-edit' style="font-size:1.5em"></i> Edit profile</a></p>
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
        <div class="body">
            <div id="R">
                <img src="<?php echo $row["Images"]; ?>" alt="">
            </div>
            <div id="RR">
                <img src="<?php echo $row["Image2"]; ?>" alt="">
                <img src="<?php echo $row["Image3"]; ?>" alt="">
            </div>
            <button>Voir plus d'images</button>
        </div>

    </div>



    <div class="louer">
        <div class="info">
            <p id="pp"> <i class='bx bxs-star'></i> Particulier</p>
            <div>
                <h1><?php echo $row["type"]; ?></h1>
                <p> <i class='bx bx-location-plus' style="color: rgb(13, 216, 216);"></i> <?php echo $row["Emplacement"]; ?> <i class='bx bx-time-five' style="margin-left:10px;color: rgb(13, 216, 216);"></i> Publié il y a <?php echo $rowulti["nb"]; ?> Mois</p>
            </div>
            <div>
                <h2>Description du logement</h2>
                <p><?php echo $row["Description"]; ?> </p>
            </div>

            <div>
                <h2>Ecoles a proximité</h2>
                <?php
                //connexion a la base de donnees 
                $nom_serveur = "localhost";
                $utilisateur = "root";
                $mot_de_passe = "";
                $nom_bd = "logements_etudiants";


                $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
                $idr = "";
                $idr = $_GET["id"];
                $sqli = "SELECT * FROM `proximite` WHERE idlogement=$idr;";
                $resulti = mysqli_query($connexion, $sqli);
                if (mysqli_num_rows($resulti) > 0) {
                    while ($rowi = $resulti->fetch_assoc()) { ?>

                        <p> <i class='bx bx-buildings' style="color: rgb(13, 216, 216);"></i>
                            
                            <?php
                            

                            //connexion a la base de donnees 
                            $nom_serveur = "localhost";
                            $utilisateur = "root";
                            $mot_de_passe = "";
                            $nom_bd = "logements_etudiants";
                            $idrr="";
                            $idrr=$rowi["idecole"];

                            $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
                            $idr = "";
                            $idr = $row["id"];
                            $sqlii = "SELECT * FROM `ecoles` WHERE idecole=$idrr;";
                            $resultii = mysqli_query($connexion, $sqlii);

                            $rowii=mysqli_fetch_assoc($resultii);

                            echo $rowii["nomecole"] ;
                            ?>
                            <label style="margin-left:10px">(Situé à  <?php echo $rowi["distance"] ; ?>m)</label>

                        </p>

                <?php
                    }
                } ?>

            </div>


        </div>
        <div class="form">


            <form method="POST">
                <h1><?php echo $row["superficie"]; ?>m<sup>2</sup> </h1>
                <h2 id="p"><?php echo $row["prixmensuel"]; ?> FCFA</h2>
                <h2 style="color: rgb(13, 216, 216);">Deposer ma candidature</h2>
                <div class="input-box">
                    <input type="text" placeholder="Nom" name="NO">
                    <i class='bx bxs-user-circle'></i>
                    <input type="text" placeholder="Adresse" name="AD" class="t">
                    <i class='bx bx-current-location' id="SS"></i>

                </div>
                <div class="input-box">
                    <input type="email" placeholder=" E-mail" name="EM" id="m">
                    <i class='bx bxs-envelope' id="TT"></i>
                </div>
                <div class="input-box">
                    <input type="number" placeholder="Telephone" name="PN">
                    <i class='bx bx-phone-call'></i>
                    <select name="SI" id="choix" class="t2">
                        <option value="Etudiant avec Garant">Etudiant avec Garant</option>
                        <option value="Etudiant sans Garant">Etudiant sans Garant</option>
                        <option value="Stagiaire">Stagiaire</option>
                        <option value="Salarié">Salarié</option>
                        <option value="Apprentis">Apprentis</option>
                        <option value="Autres">Autres</option>

                    </select>
                    <i class='bx bxs-bank'></i>
                </div>
                <div class="input-box" id="input-box">
                    <div>
                        <h5>Revenus salariaux</h5>
                        <input type="number" min='0' placeholder="Salaire" name="SA">
                        <i class='bx bx-dollar'></i>
                    </div>
                    <div>
                        <h5>Revenus Garants</h5>
                        <input type="number" placeholder="Salaire" name="SR">
                        <i class='bx bx-dollar'></i>
                    </div>
                </div>



                <div id="input-box" class="input-box">
                    <div>
                        <h5>Date d'entree</h5>
                        <input type="date" placeholder="Selectionner" name="DA">
                        <i class='bx bxs-calendar'></i>
                    </div>
                    <div>
                        <h5>Duree de location</h5>
                        <select name="DU" id="choix2">
                            <option value="">Selectionner</option>
                            <option value="1 ">1 mois</option>
                            <option value="2 ">2 mois</option>
                            <option value="3 ">3 mois</option>
                            <option value="4 ">4 mois</option>
                            <option value="5 ">5 mois</option>
                            <option value="6 ">6 mois</option>
                            <option value="7 ">7 mois</option>
                            <option value="8 ">8 mois</option>
                            <option value="9 ">9 mois</option>
                            <option value="10 ">10 mois</option>
                            <option value="11 ">11 mois</option>
                            <option value="12">1 an</option>
                            <option value="24">2 ans</option>



                        </select>
                        <i class='bx bx-time-five'></i>
                    </div>

                </div>
                <input type="submit" id="btn1" name="candidater" value="Candidater">

            </form>
        </div>
    </div>
    <div class="foot">

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