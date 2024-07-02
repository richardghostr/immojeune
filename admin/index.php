<?php
$username = "";
$password = "";
$get = "";
$b = "";

//connexion a la base de donnees 
$nom_serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bd = "logements_etudiants";


$connexion = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_bd);




if (isset($_POST['ok'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $requete = "SELECT * FROM admin WHERE username='$username' AND password= '$password'";

   $get = $connexion->query($requete);

   if ($get->num_rows > 0) {
      
  
      header("location:/immojeune/admin/dashbord.php");
      exit;
   } else {
      $b=1+1;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/immojeune/css/connexion.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <title>login</title>
</head>

<body>

   <div class="form">
      <form method="POST">

         <h1>Administration</h1>
         <P >Connecter vous</P>
         <div class="input-box">
            <input type="text" placeholder="Username" name="username">
            <i class="bx bxs-user"></i>
         </div>
         <div class="input-box">
            <input type="password" placeholder="Password" name="password">
            <i class="bx bxs-lock-alt"></i>
         </div>

         <button type="submit" class="btn" name="ok">Login</button>
         <div style="margin-top: 20px;margin-left:20%">
            <?php
            if ($b) {
               echo "Vous n'avez pas de compte !";
            }else{
               echo"";
            }
            ?>

         </div>
      </form>

   </div>


</body>

</html>