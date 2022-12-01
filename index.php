<?php
include("function.php");
session_start();
creationPanier()
?>
<!DOCTYPE html>
<html lang="en">
<?php


if (isset($_POST['email'])) {
  if (!isset($_SESSION['id'])) {
      connexion();
  } else {
      echo "<script>alert(\"Vous êtes déjà connecté !\")</script>";
  }
}
include('./head.php');

if (isset($_POST['deconnexion'])){
  logOut();
}
?>




<body>


  <div class="container ">
    <div class="row text-center justify-content-center">
      <?php
    $articles = getArticles();
     showArticles($articles);
      ?>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>