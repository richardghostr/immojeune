<?php
if (isset($_POST["supprimer"]) && !empty($_GET["id"])) {
    header("location:delete.php?id=" . $_GET["id"]);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logements</title>
    <link rel="stylesheet" href="/immojeune/css/logement.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<body>

    <nav class="navbar2">
        <a href="" class="logo" style="margin-left: -10px;"><i class='bx bx-aperture'></i>Houzez</a>
        <div class="navlist" style="margin-left: -30px; margin-top:140px">
            <ul>
                <li><a href="/immojeune/admin/dashbord.php" style="text-decoration: none;"><i class='bx bxs-dashboard' style="margin-left: 5px;"></i> Tableau de bord</a></li>
                <li><a href="/immojeune/admin/logement.php" style="text-decoration: none;"><i class='bx bx-home' style="margin-left: 5px;"></i> Logements</a></li>
                <li><a href="/immojeune/admin/reservation.php" style="text-decoration: none;"><i class='bx bx-cart' style="margin-left: 5px;"></i> Reservations</a></li>
                <li><a href="/immojeune/admin/Ecole.php" style="text-decoration: none;"><i class='bx bxs-school' style="margin-left: 5px;"></i> Ecoles</a></li>
                <li><a href="/immojeune/admin/profile.php" style="text-decoration: none;"><i class='bx bxs-user-circle' style="margin-left: 5px;"></i> Mon Profil</a></li>
                <li style="margin-top: 180px;"><a href="/immojeune/admin/index.php" style="text-decoration: none;"><i class='bx bx-log-out' style="margin-left: 5px;"></i> Se deconnecter</a></li>

            </ul>

        </div>

    </nav>


    <div class="navbare">
        <div class="rr">
        </div>
        <div class="body">
            <div class="search">
                <div class="form">
                    <div class="input-box">
                        <p style="margin-left:5px">Trier par:</p>
                        <form method="POST">
                            <select name="DU" id="choix2">
                                <option>Par defaut</option>
                                <option value="1"> Prix mensuel croissant</option>
                                <option value="2">Prix mensuel decroissant</option>
                                <option value="3">Prix annuel croissant</option>
                                <option value="4">Prix annuel decroissant</option>
                                <option value="5">Superficie croissante</option>
                                <option value="6">Superficie decroissante</option>
                                <option value="7">Date croissante</option>
                                <option value="8">Date decroissante</option>
                                <option value="9">Statut (libre)</option>
                                <option value="10">Statut(occupé)</option>
                            </select>     
                            <input type="submit" name="rechercher" hidden id="richer">
                        </form>


                        <!-- <script>
                            document.getElementById("choix2").addEventListener("change", function() {
                                validateSelectBox();
                            });

                            function validateSelectBox() {
                                var selectBox = document.getElementById("choix2");
                                var selectedValue = selectBox.value;

                                $.ajax({

                                    url: "/immojeune/admin/logement.php",
                                    method: "POST",
                                    data: {
                                        selectedValue: selectedValue
                                    },

                                });

                            }
                        </script> -->
                    </div>
                    <div class="input-box">
                        <p>Rechecher un emplacement</p>
                        <input type="text" placeholder="Emplacement" id="art">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#art").keyup(function() {
                                    var input = $(this).val();
                                    //  alert(input);

                                    if (input != "") {
                                        $.ajax({
                                            url: "/immojeune/admin/livesearch.php",
                                            method: "POST",
                                            data: {
                                                inputv: input
                                            },

                                            success: function(data) {
                                                $("#tyo2").html(data);
                                                $("#tyo2").css("z-index", "2");
                                                $("#tyo2").css("display", "flex");
                                            }
                                        });
                                    } else {
                                        $("#tyo2").css("display", "none");
                                    }
                                });

                            });
                        </script>
                        <div id="tyo2">
                            <div>
                                <p></p>
                                <p></p>
                                <p style="height:2px;background-color:black;width:200px"></p>
                            </div>

                        </div>
                    </div>
                    <div class="input-box">
                        <p>Rechecher une Description</p>
                        <input type="text" placeholder="Description" id="artz">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#artz").keyup(function() {
                                    var input = $(this).val();
                                    // alert(input);

                                    if (input != "") {
                                        $.ajax({
                                            url: "/immojeune/admin/livesearch.php",
                                            method: "POST",
                                            data: {
                                                input: input
                                            },

                                            success: function(data) {
                                                $("#tyo").html(data);
                                                $("#tyo").css("z-index", "2");
                                                $("#tyo").css("display", "flex");
                                            }
                                        });
                                    } else {
                                        $("#tyo").css("display", "none");
                                    }
                                });

                            });
                        </script>
                        <div id="tyo">
                            <div>
                                <p>id</p>
                                <p>Description</p>
                                <p style="height:2px;background-color:black;width:200px"></p>
                            </div>

                        </div>

                    </div>
                    <div class="input-box">
                        <p>Rechecher une Date</p>
                        <input type="date" placeholder="Date" id="arte">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#arte").keyup(function() {
                                    var input = $(this).val();
                                    //  alert(input);

                                    if (input != "") {
                                        $.ajax({
                                            url: "/immojeune/admin/livesearch.php",
                                            method: "POST",
                                            data: {
                                                inputr: input
                                            },

                                            success: function(data) {
                                                $("#tyo3").html(data);
                                                $("#tyo3").css("z-index", "2");
                                                $("#tyo3").css("display", "flex");
                                            }
                                        });
                                    } else {
                                        $("#tyo3").css("display", "none");
                                    }
                                });

                            });
                        </script>
                        <div id="tyo3">
                            <div>
                                <p>id</p>
                                <p>Date</p>
                                <p style="height:2px;background-color:black;width:200px"></p>
                            </div>

                        </div>

                    </div>
                    <div class="btn" style="outline:none;margin-left:-31px">
                        <label id="o" for="richer" value="Appliquer le filtre" style="padding-top:10px">Appliquer le filtre</label>
                        <button id="oo" for="gg"><a href="logement.php" style="color:white;text-decoration:none" id="gg">Revenir a l'etat initial</a></button>
                    </div>



                </div>


            </div>
            <div id="ooo" style="right:-60px">

                <button> <a href="addlogement.php" class='btn btn-primary btn-sm'>Nouveau logement</a></button>
            </div>
            <table class="table" style="width: 1228px;" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Prix mensuel</th>
                        <th>Prix annuel</th>
                        <th>Superficie</th>
                        <th>Emplacement</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Reservation</th>
                        <th>Date d'ajout</th>
                        <th>Options </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //connexion a la base de donnees 
                    $nom_serveur = "localhost";
                    $utilisateur = "root";
                    $mot_de_passe = "";
                    $nom_bd = "logements_etudiants";


                    $connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);

                    $sql = "SELECT * FROM logements";
                    $b = $connexion->query($sql);


                    if (isset($_POST['rechercher']) ) {
                        $ro = intval($_POST['DU']);
                        if ($ro == 1) {
                            $sql = "SELECT * FROM `logements` ORDER BY prixmensuel";
                        }
                        if ($ro == 2) {
                            $sql = "SELECT * FROM `logements` ORDER BY prixmensuel DESC";
                        }
                        if ($ro == 3) {
                            $sql = "SELECT * FROM `logements` ORDER BY prixannuel";
                        }
                        if ($ro == 4) {
                            $sql = "SELECT * FROM `logements` ORDER BY prixannuel DESC";
                        }
                        if ($ro == 5) {
                            $sql = "SELECT * FROM `logements` ORDER BY superficie";
                        }
                        if ($ro == 6) {
                            $sql = "SELECT * FROM `logements` ORDER BY superficie DESC";
                        }
                        if ($ro == 7) {
                            $sql = "SELECT * FROM `logements` ORDER BY 	Dateajout";
                        }
                        if ($ro == 8) {
                            $sql = "SELECT * FROM `logements` ORDER BY 	Dateajout DESC";
                        }
                        if ($ro == 9) {
                            $sql = "SELECT * FROM `logements` WHERE statuts='libre'";
                        }
                        if ($ro == 10) {
                            $sql = "SELECT * FROM `logements` WHERE statuts='occupé'";
                        }
                        $b = $connexion->query($sql);
                    }

                    while ($row = $b->fetch_assoc()) {
                        echo "
                        <tr class='line'>
                        <td style='width: 10px;'>" . $row["id"] . "</td>
                        <td>" . $row["type"] . "</td>
                        <td>" . $row["statuts"] . "</td>
                        <td>" . $row["prixmensuel"] . " FCFA</td>
                        <td>" . $row["prixannuel"] . " FCFA</td>
                        <td>" . $row["superficie"] . " m<sup>2</sup></td> 
                        <td>" . $row["Emplacement"] . "</td>
                        <td>" . $row["Description"] . "</td>
                        <td><a href='/immojeune/img'>3</a></td>
                        <td>" . $row["Reservations"] . "</td>
                        <td>" . $row["Dateajout"] . "</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='/immojeune/admin/edit.php?id= $row[id]'>Modifier</a> 
                        <a class='btn btn-danger btn-sm' href='/immojeune/admin/logement.php?action=delete&id=$row[id]'>Supprimer</a></td> 
                        </tr> ";
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>

    </div>
    <?php
    if (isset($_GET["action"]) and isset($_GET["id"])) {
        if ($_GET["action"] == "delete" and !empty($_GET["id"])) {
            $id = $_GET["id"]; ?>
            <form method="post" id="popupContainer">
                <div id="popup">
                    <h2 style="display:flex;justify-content:center;margin-top:30px;font-size:1.6em;font-weight:700">Confirmez-vous la suppression ?</h2>
                    <label style="display:flex;justify-content:center;width: 90%;height:1px;background-color:blue;margin-top:10px;margin-left:20px;"></label>
                    <P style="display:flex;justify-content:center;margin-top:0px ;margin-left:40px;margin-right:40px;text-align:center"> Cette action sera irreversible. si vous confirmez, ce logement sera définitivement effacé.</P>
                    <div class="btnPanel" style="margin-top:-10px">
                        <a href="logement.php" class='btn btn-danger btn-sm' style="color: white;border: none; padding: 20px 30px;">Annuler</a>
                        <input type="submit" class='btn btn-primary btn-sm' value="Supprimer" name="supprimer" style="color: white;border: none; padding: 10px 20px 30px 28px;;display:flex;align-items:center;justify-content:center">
                    </div>
                </div>
            </form>
    <?php
        }
    }
    ?>
    <script>
        function sliceText(elem, max) {
            let text = elem.textContent;

            if (text.length > max) {
                let nText = text.slice(0, max - 1);
                return nText + "...";
            } else {
                return text;
            }
        }
        const lines = document.querySelectorAll(".line td:not(:last-of-type)");

        for (let line of lines) {
            line.textContent = sliceText(line, 11);
        }
    </script>
</body>
<div hidden id="result">
    </divhidden>

    <!-- $cc = $row["id"];

$ree = "SELECT COUNT(id) AS total FROM Reservations WHERE Reservations.idlogement=$cc";
$pp = $connexion->query($ree);
while ($p = $pp->fetch_assoc()) {
    $num = $p["total"];
    $requete="UPDATE logements INNER JOIN reservations SET logemenents.Reservations=$num WHERE reservations.idlogement=$cc";
    $connexion->query($requete);
    
} -->

</html>