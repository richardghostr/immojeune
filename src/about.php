<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/about.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>A propos</title>
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


    <section class="submit">
        <h1>A propos</h1>
        <p style="background-color:aqua;width:150px;height:2.5px;margin-top:10px"></p>
        <p style="background-color:aqua;width:75px;height:1.2px;margin-top:5px ;margin-bottom:-25px"></p>
        <div class="io">
            <div style="width: 55%;margin-top:50px">
                <p>Bienvenue sur notre site d'offre de logements étudiants. Nous sommes une plateforme en ligne qui permet aux étudiants de trouver facilement un logement adapté à leurs besoins et à leur budget. Nous sommes conscients que la recherche d'un logement peut être stressante et chronophage pour les étudiants, c'est pourquoi nous avons créé ce site pour faciliter cette tâche.</p>
                <p>Nous travaillons avec des propriétaires de logements étudiants et des agences immobilières pour offrir une large gamme d'options de logement aux étudiants. Nous proposons des chambres individuelles, des studios, des appartements partagés et des résidences universitaires dans différentes villes du pays. Nous avons également des options de logement pour les étudiants internationaux qui cherchent à étudier dans notre pays.</p>
                <p>Nous comprenons que chaque étudiant a des besoins différents en matière de logement, c'est pourquoi nous avons mis en place un système de recherche avancé pour aider les étudiants à trouver le logement qui correspond le mieux à leurs besoins. Les étudiants peuvent filtrer les résultats de recherche en fonction de leur budget, de la ville où ils souhaitent vivre, de la proximité des transports en commun, de la présence d'équipements tels que des supermarchés, des restaurants, etc.</p>
                <p>Nous sommes fiers de travailler avec des propriétaires de logements étudiants et des agences immobilières qui respectent les normes de qualité et de sécurité. Nous vérifions chaque annonce avant de la publier sur notre site pour nous assurer que les informations fournies sont exactes et que les photos correspondent à la réalité du logement.</p>
                <!-- <p>Nous sommes également conscients que les étudiants ont souvent un budget limité pour leur logement, c'est pourquoi nous proposons des options de logement abordables sans compromettre la qualité et le confort. Nous travaillons avec nos partenaires pour négocier des prix compétitifs pour les étudiants.</p> -->
                <p>Nous sommes convaincus que notre site est l'outil idéal pour aider les étudiants à trouver un logement adapté à leurs besoins et à leur budget. Nous sommes là pour vous accompagner tout au long du processus de recherche de logement et pour répondre à toutes vos questions. N'hésitez pas à nous contacter si vous avez besoin d'aide ou si vous avez des commentaires sur notre site.</p>
            </div>
            <div class="rr">

            </div>
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

</body>

</html>