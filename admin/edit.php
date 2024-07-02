<?php
$id = "";
$em = "";
$de = "";
$pm = "";
$pa = "";
$su = "";
$ty = "";
$im = "";
$errorMessage = "";
$successMessage = "";
$row = "";


//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location: /immojeune/admin/logement.php");
        exit;
    }


    $id = $_GET["id"];
    $sql = "SELECT * FROM logements WHERE id=$id";
    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("location:/immojeune/admin/logement.php");
        exit;
    }
    $em = $row["Emplacement"];
    $de = $row["Description"];
    $pm = $row["prixmensuel"];
    $pa = $row["prixannuel"];
    $su = $row["superficie"];
    $ty = $row["type"];
    $file_name = $row["Images"];
    $file_nameo = $row["Image2"];
    $file_nameoo = $row["Image3"];
} else {
    $id = $_POST['id'];
    $em = $_POST['EM'];
    $de = $_POST['DE'];
    $pm = $_POST['PM'];
    $pa = $_POST['PA'];
    $su = $_POST['SU'];
    $ty = $_POST['TY'];
    $file_name = $_FILES['image']['name'];
    $file_nameo = $_FILES['imageo']['name'];
    $file_nameoo = $_FILES['imageoo']['name'];

    do {
        if (empty($em) || empty($de) || empty($pm) || empty($pa) || empty($su) || empty($ty)) {
            $errorMessage = 1 + 3;
            break;
        } else {


            $id = $_GET["id"];
            $sl = "UPDATE logements SET prixmensuel= $pm ,prixannuel=$pa ,Emplacement= '$em' ,Description= '$de',superficie=$su,type=' $ty' WHERE id=$id";
            $result = $connexion->query($sl);
        }

        header("location:/immojeune/admin/logement.php");
        exit;
    } while (true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/immojeune/css/addlogement.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>Modifier logement</title>
</head>

<body>


    <nav class="navbar2">
        <a href="" class="logo" style="margin-left: -10px;"><i class='bx bx-aperture'></i>Houzez</a>
        <div class="navlist" style="margin-left: -0px; margin-top:120px">
            <ul style="font-size: 1em;">
                <li><a href="/immojeune/admin/dashbord.php" style="text-decoration: none;"><i class='bx bxs-dashboard' style="margin-left: 5px;"></i> Tableau de bord</a></li>
                <li><a href="/immojeune/admin/logement.php" style="text-decoration: none;"><i class='bx bx-home' style="margin-left: 5px;"></i> Logements</a></li>
                <li><a href="/immojeune/admin/reservation.php" style="text-decoration: none;"><i class='bx bx-cart' style="margin-left: 5px;"></i> Reservations</a></li>
                <li><a href="/immojeune/admin/Ecole.php" style="text-decoration: none;"><i class='bx bxs-school' style="margin-left: 5px;"></i></i> Ecoles</a></li>
                <li><a href="/immojeune/admin/profile.php" style="text-decoration: none;"><i class='bx bxs-user-circle' style="margin-left: 5px;"></i> Mon Profil</a></li>
                <li style="margin-top: 180px;"><a href="/immojeune/admin/index.php" style="text-decoration: none;"><i class='bx bx-log-out' style="margin-left: 5px;"></i> Se deconnecter</a></li>

            </ul>

        </div>

    </nav>

    <div class="navbar">
        <div class="aj">
            <a href="#">Modifier un logement</a>
        </div>
        <div class="navlinks">


            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <h3>Type de logement</h3>
                <div class="input-box">
                    <select name="TY" id="choix">
                        <option value="Chambre">Chambre</option>
                        <option value="Studio">Studio</option>
                        <option value="Appartement">Appartement</option>
                    </select>

                </div>
                <h3>Emplacement du logement</h3>
                <div class="input-box">
                    <input type="text" placeholder="Emplacement" name="EM" value="<?php echo $em; ?>">
                </div>
                <h3>Prix mensuel</h3>
                <div class="input-box">
                    <input type="number" min="0" placeholder="Prix Mensuel" name="PM" value="<?php echo $pm; ?>">

                </div>
                <h3>Prix annuel</h3>
                <div class="input-box">
                    <input type="number" min="0" placeholder="Prix Annuel" name="PA" value="<?php echo $pa; ?>">

                </div>
                <h3>Superficie</h3>
                <div class="input-box">
                    <input type="number" min="0" placeholder="Superficie" name="SU" value="<?php echo $su; ?>">

                </div>
                <h3>Breve description du logement</h3>
                <div class="input-box">
                    <textarea id="r" type="text" name="DE" style=" width: 480px; 
   height: 70px;
   margin-top: 5px;
   margin-bottom: 20px;
   border: 0.1px solid rgb(0, 157, 255);
   outline: none;
   padding-left:5px;
   padding-top :5px"><?php echo $de; ?></textarea>

                </div>
                <h3>Images</h3>
                <div class="input-box" style="display: flex; justify-content:space-between; width: 350px">
                    <label for="file" style="display: inline-flex; height: 100px; width: 100px; border: 2px dashed  rgb(0, 157, 255); cursor: pointer; border-radius: 20px; margin-top: 8px">
                        <input id="file" type="file" placeholder="image" name="image" accept="image/*" value="<?php echo $file_name; ?>" style="display: none;" required>

                        <span id="uploaded_image" style="display:flex; height: 100px; width: 100px; border-radius: 20px;overflow: hidden;"></span>


                    </label>
                    <label for="file2" style="display: inline-flex; height: 100px; width: 100px; border: 2px dashed  rgb(0, 157, 255); cursor: pointer; border-radius: 20px; margin-top: 8px">
                        <input required id="file2" type="file" placeholder="image" name="imageo" value="<?php echo $file_nameo; ?>" accept="image/*" style="display: none;">

                        <span id="uploaded_image2" style="display:flex; height: 100px; width: 100px; border-radius: 20px;overflow: hidden;"></span>


                    </label>
                    <label for="file3" style="display: inline-flex; height: 100px; width: 100px; border: 2px dashed  rgb(0, 157, 255); cursor: pointer; border-radius: 20px; margin-top: 8px">
                        <input required id="file3" type="file" placeholder="image" value="<?php echo $file_nameoo; ?>" name="imageoo" accept="image/*" style="display: none;">

                        <span id="uploaded_image3" style="display:flex; height: 100px; width: 100px; border-radius: 20px;overflow: hidden;"></span>


                    </label>
                </div>
                <div id="Message">
                    <?php
                    if ($errorMessage) {
                        echo "Veuillez remplir tous les champs";
                    }
                    ?>


                </div>
                <div class="btn" for="green">
                    <input type="submit" id="green" name="modifier" value="Modifier" style="color:white">
                </div>
            </form>
            <div class="btn2" for="red">
                <button type="submit" id="red" name=""> <a href="/immojeune/admin/logement.php">Annuler</a></button>
            </div>

        </div>
    </div>
</body>


<script>
    $(document).ready(function() {
        $(document).on('change', '#file', function() {
            var name = document.getElementById("file").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);
            var f = document.getElementById("file").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('file').files[0]);
                $.ajax({
                    url: "/immojeune/upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function(data) {
                        $('#uploaded_image').html(data);
                    }
                });
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        $(document).on('change', '#file2', function() {
            var name = document.getElementById("file2").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file2").files[0]);
            var f = document.getElementById("file2").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('file2').files[0]);
                $.ajax({
                    url: "/immojeune/upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#uploaded_image2').html("<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function(data) {
                        $('#uploaded_image2').html(data);
                    }
                });
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        $(document).on('change', '#file3', function() {
            var name = document.getElementById("file").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file3").files[0]);
            var f = document.getElementById("file3").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('file3').files[0]);
                $.ajax({
                    url: "/immojeune/upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#uploaded_image3').html("<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function(data) {
                        $('#uploaded_image3').html(data);
                    }
                });
            }
        });
    });
</script>


</html>