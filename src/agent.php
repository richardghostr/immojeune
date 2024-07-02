
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/agent.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Decouvrir Nos Agents</title>
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
    <div class="agent">
        <div style="display:flex;justify-content: center;flex-direction:column;width:400px;align-items:center">
            <h1 style="margin-bottom:30px">Agents</h1>
            <p style="height: 3.5px; background-color:aqua; margin-bottom:10px;width:150px"></p>
            <p style="height: 2px; background-color:aqua;width:80px; margin-bottom:40px"></p>
        </div>
        <div id="rt">

            <?php
            $nom_serveur = "localhost";
            $utilisateur = "root";
            $mot_de_passe = "";
            $nom_bd = "logements_etudiants";
            $emp = "";

            $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);


            $requete = "SELECT * FROM `agent`";
            $b = $connexion->query($requete);


            while ($row = $b->fetch_assoc()) { ?>

                <div class="zz">
                    <div style="display: flex;width:100%;height:50vh;object-fit:contain">
                        <img src="<?php echo $row["images"];?>" alt="" style="width:400px ;border:none">
                    </div>

                    <div style="display:flex;justify-content: center;flex-direction:column;align-items:center">
                        <h3 style="margin-top:20px"><?php echo $row["name"];?></h3>
                        <p style="margin-top:5px ;font-weight:200">Houzez - Agent</p>
                        <p style="margin-top:5px ;font-weight:600">+237<?php echo $row["numero"];?></p>

                    </div>
                </div>
            <?php
            } ?>

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

</html>