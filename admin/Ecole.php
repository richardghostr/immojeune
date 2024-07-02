<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/ecole.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Ecoles</title>
</head>

<body>


    <nav class="navbar2">
        <a href="" class="logo" style="margin-left: -10px;"><i class='bx bx-aperture'></i>Houzez</a>
        <div class="navlist" style="margin-left: -0px; margin-top:120px">
            <ul style="font-size: 1em;">
                <li><a href="/immojeune/admin/dashbord.php" style="text-decoration: none;"><i class='bx bxs-dashboard' style="margin-left: 5px;"></i> Tableau de bord</a></li>
                <li><a href="/immojeune/admin/logement.php" style="text-decoration: none;"><i class='bx bx-home' style="margin-left: 5px;"></i> Logements</a></li>
                <li><a href="/immojeune/admin/reservation.php" style="text-decoration: none;"><i class='bx bx-cart' style="margin-left: 5px;"></i> Reservations</a></li>
                <li><a href="/immojeune/admin/Ecole.php" style="text-decoration: none;"><i class='bx bxs-school' style="margin-left: 5px;"></i> Ecoles</a></li>
                <li><a href="/immojeune/admin/profile.php" style="text-decoration: none;"><i class='bx bxs-user-circle' style="margin-left: 5px;"></i> Mon Profil</a></li>
                <li style="margin-top: 180px;"><a href="/immojeune/admin/index.php" style="text-decoration: none;"><i class='bx bx-log-out' style="margin-left: 5px;"></i> Se deconnecter</a></li>

            </ul>

        </div>

    </nav>

    <div style="width: 100%;">

        <H1>Ecoles</H1>
        <a href='/immojeune/admin/Ecole.php?action=add' style="position:absolute;top: 120px;left: 1260px;outline: none;cursor: text;display: flex;width: 200px;height: 7vh;border-radius: 10px;margin-left: 20px;border: none;font-weight: 600;margin-top: -10px;outline: none;cursor: pointer;background-color:rgb(5, 46, 67);color:white;align-items:center;justify-content:center">
            Ajouter
        </a>
        <div style="width: 96.5%; height:4px;background-color:black;margin-bottom:80px"></div>

        <?php

        //connexion a la base de donnees 
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_bd = "logements_etudiants";


        $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
        $sql = "SELECT * FROM `ecoles`;";
        $result = mysqli_query($connexion, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) { ?>

                <H3 style="margin-bottom:20px"><?php echo $row["nomecole"]; ?></H3>
                <h4 style="margin-bottom:15px">Logements a proximité</h4>

                <?php
                $id = "";
                $id = $row["idecole"];
                $sqli = "SELECT * FROM `proximite` WHERE idecole=$id;";
                $resulti = mysqli_query($connexion, $sqli);
                if (mysqli_num_rows($resulti) > 0) {
                    while ($rowi = $resulti->fetch_assoc()) { ?>
                        <p style="display:flex">ID: <strong><?php echo $rowi["idlogement"] ?></strong> <label for="" style="margin-left:180px;width:150px"> TYPE: <strong>
                                    <?php

                                    //connexion a la base de donnees 
                                    $nom_serveur = "localhost";
                                    $utilisateur = "root";
                                    $mot_de_passe = "";
                                    $nom_bd = "logements_etudiants";


                                    $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

                                    $idd = $rowi["idlogement"];
                                    $ds = $rowi["distance"];
                                    $sqlii = "SELECT `type` FROM `logements` WHERE logements.id=$idd ;";
                                    $resultii = mysqli_query($connexion, $sqlii);
                                    $rowii = $resultii->fetch_assoc();
                                    echo $rowii["type"];

                                    ?>

                                </strong> </label> <label for="" style="margin-left:200px;width:150px;display:flex;justify-content:flex-start"> DISTANCE: <strong> <?php echo $rowi["distance"] ?>m</strong> </label></p>


                <?php
                    }
                } ?>
                <div style="width: 60.5%; height:2px;background-color:black;margin-bottom:60px;margin-top:20px;margin-left:270px"></div>

        <?php     }
        }


        ?>

    </div>



    <?php
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "add") { ?>
            <form method="post" id="popupContainer">
                <div id="popup">
                    <h2 style="display:flex;justify-content:center;margin-top:30px">Definir une proximité !</h2>
                    <div style="display:flex;justify-content:center;width: 90%;height:1px ;background-color:whitesmoke;margin-top:20px;margin-left:20px;margin-bottom:15px"></div>
                    <input type="number" min=0 placeholder="ID de l'ecole" name="ide" style="display:flex;justify-content:center;width: 90%;height:40px ;background-color:trans;margin-top:10px;margin-left:20px;border-radius:5px;border:3px solid whitesmoke;outline:none;padding-left:10px">
                    <input type="number" min=0 placeholder="ID du logement" name="idl" style="display:flex;justify-content:center;width: 90%;height:40px ;background-color:trans;margin-top:10px;margin-left:20px;border-radius:5px;border:3px solid whitesmoke;outline:none;padding-left:10px">
                    <input type="number" min=0 placeholder="Distance entre les deux" name="dis" style="display:flex;justify-content:center;width: 90%;height:40px ;background-color:trans;margin-top:10px;margin-left:20px;border-radius:5px;border:3px solid whitesmoke;outline:none;padding-left:10px">
                    <div class="btnPanel">
                        <a href="Ecole.php" class='btn btn-danger btn-sm'>Annuler</a>
                        <input type="submit" class='btnr btnr-primary btn-sm' name="def" value="Definir" style="width:130px;font-size:1.1em;">
                    </div>
                </div>
            </form>
    <?php
        }
    }
    ?>



    <?php

    //connexion a la base de donnees 
    $nom_serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_bd = "logements_etudiants";


    $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);
    $idl="";
    $ide="";
    $dis="";



    if (isset($_POST['def'])) {
        $idl = $_POST["idl"];
        $ide = $_POST["ide"];
        $dis = $_POST["dis"];

        $sqlii = "INSERT INTO `proximite`(`idlogement`, `idecole`, `distance`) VALUES ($idl,$ide,$dis)";
        $resultii = mysqli_query($connexion, $sqlii);

        echo "<script>window.location='Ecole.php'</script>";
        exit;
    }



    ?>



</body>

</html>