<?php

$number = "";
$mail = "";
$username = "";
$password = "";
$cpassword = "";
$a = "";
$ro = "";
$role = "Locataire";
$c = "";
$b = "";
$d = "";
//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);





if (isset($_POST['ok'])) {


    $username = $_POST['username'];
    $mail = $_POST['Email'];
    $number = $_POST['Phonenumber'];
    $password = $_POST['password'];
    $cpassword = $_POST['pp'];
    $row = "";

    if (empty($username) || empty($mail) || empty($number) || empty($password) || empty($cpassword)) {
        $d = 1 + 3;
    } else {
        $select = "SELECT * FROM utilisateurs WHERE telephone=$number OR email='$mail'";
        $ro = $connexion->query($select);

        if ($ro->num_rows > 0) {
            $c = 1 + 2;
        } else {
            if ($password != $cpassword) {
                $b = 1 + 1;
            } else {
                $requete = "INSERT INTO  utilisateurs ( nom, email, telephone, password)  VALUES ('$username','$mail',$number,'$password')";
                $a =  $connexion->query($requete);

               

                $nom_utilisateur = "$username";
                $email_utilisateur = "$mail";
                $num_utilisateur="$number";

                // Sauvegarder les données dans des cookies
                setcookie("nom_utilisateur", $nom_utilisateur, time() + (86400 * 30), "/"); // Cookie valable pendant 30 jours
                setcookie("email_utilisateur", $email_utilisateur, time() + (86400 * 30), "/");
                setcookie("num_utilisateur", $num_utilisateur, time() + (86400 * 30), "/");

                header("location:/immojeune/index.php");
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/immojeune/css/registration.css">
    <title>S'enregistrer</title>
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
                    <li class="t">|</li>
                    <li><a href="/immojeune/src/login.php" class="login2">Se connecter</a></li>
                    <li class="t">-</li>
                    <li><a href="/immojeune/src/register.php" class="login1">S'inscrire</a></li>
                </div>
                <div class="btn">
                    <li><a href="">DEPOSER UNE ANNONCE</a></li>
                </div>

            </div>
        </div>
    </div>
    <div class="registration">

        <div class="form1">
            <form action="" method="POST">
                <h1>Inscription</h1>
                <p>Creer votre compte</p>
                <div style="width:100%;display :flex;justify-content:center; margin-top:20px;margin-bottom:10px;color:red">
                    <?php
                    if ($b) {
                        echo "Les mots de passe ne concordent pas";
                    } else if ($c) {
                        echo "L'utilisateur existe deja !";
                    } else if ($d) {
                        echo "Veuillez renseigner tous les champs !";
                    }
                    ?></div>
                <div class="input-box">
                    <input type="text" placeholder=" Username" name="username" value="<?php echo $username; ?>">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder=" E-mail" name="Email" value="<?php echo $mail; ?>">
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="number" placeholder=" Phone number" name="Phonenumber" value="<?php echo $number; ?>">
                    <i class='bx bx-phone-call'></i>

                </div>
                <div class="input-box">
                    <input type="password" placeholder=" Password" name="password" value="<?php echo $password; ?>">
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder=" Comfirm Password" name="pp" value="<?php echo $cpassword; ?>">
                    <i class="bx bxs-lock-alt"></i>
                </div>


                <button type="submit" class="btn1" name="ok" style="color:white">SIGN UP</button>
                <div class="register-link">
                    <p>Avez vous deja un compte ? <a href="/immojeune/src/login.php"> Se connecter </a></p>
                </div>
            </form>

        </div>
    </div>

    <div style="height:70vh;width: 100%;"></div>
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