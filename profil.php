<?php
session_start();
include("function.php");

?>





<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>


  <div class="modif-comptes"><h4>Mes comptes</h4></div>

 



<div class="modif-div">

<a href="modifiermesinformations.php"><i class="fa-solid fa-user fa-5x"></i><button type="button" class="btn btn-dark"> Modifier mes informations</button></a>


<a href="modifiermonmotdepasse.php"><i class="fa-solid fa-key fa-5x"></i><button type="button" class="btn btn-dark">Modifier mon mot de passe</button></a>


<a href="modifiermonadresse.php"><i class="fa-solid fa-house fa-5x"></i><button type="button" class="btn btn-dark">Modifier mon adresse </button></a>


<a href="commande.php"><i class="fa-solid fa-calendar-days fa-5x"></i><button type="button" class="btn btn-dark">Voir mes commandes</button></a>
</div>



</body>
</html>