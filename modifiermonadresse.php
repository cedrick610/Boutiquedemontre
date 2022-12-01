
<?php
session_start();
include("function.php");

?>
<?php
include('./head.php');
?>


<?php

if (isset($_POST['adresse'])){
  modifiAdresse();
  
}

?>
<body>
    

<div class="modifadresse">
<h5>Modifier mon adresse</h5>
</div>



<div class="container w-50 border border-dark bg-light mb-4 p-5">


<form action="modifiermonadresse.php" method="post"  class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">adresse</label>
    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $_SESSION['adresse']['adresse'] ?>" name="adresse" required>
    <div class="valid-feedback">
    
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">code postal</label>
    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $_SESSION ['adresse']['code_postal'] ?>" name="code_postal" required>
    <div class="valid-feedback">
  
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">ville</label>
    <input type="text" class="form-control" id="validationCustom03" value="<?php echo $_SESSION ['adresse']['ville'] ?>" name="ville" required>
  </div>
  <div class="col-12 modifadresse-full">
    <button class="btn btn-dark" type="submit">valider</button>
  </div>
</form>
</div>


</div>


<div class="modifmonadresse-div">
<button type="submit" class="btn btn-dark">modifier mes informations</button>
<button type="submit" class="btn btn-dark">modifier mon adresse</button>
<button type="submit" class="btn btn-dark">voir mes commandes</button>
 
</div>

</body>



</body>
</html>