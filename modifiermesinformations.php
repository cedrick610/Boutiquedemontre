<?php
session_start();
include("function.php");

?>
<?php
include('./head.php');
?>
<?php
if (isset($_POST['nom'])){
    modifInfo();
    
}

?>
<body>

<div class="modifinfo-full">
<h5>Modifier mes informations</h5>
</div>
   



    <div class="container w-50 border border-dark bg-light mb-4 p-5">

        <form  class=""  action="modifiermesinformations.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">nom</label>
                <input type="text" class="form-control" id="validationCustom01" value="<?=$_SESSION['nom']?>" name="nom" required>
                <div class="valid-feedback">

                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">prenom</label>
                <input type="text" class="form-control" id="validationCustom02" value="<?php $_SESSION['prenom']?>" name="prenom" required>
                <div class="valid-feedback">

                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">email</label>
                <input type="text" value="<?php $_SESSION['email']?>" class="form-control" id="validationCustom03" name="email" required>
            </div>
            <div class="col-12 modifinfo_btn">
                <button class="btn btn-dark"name="validation" type="submit">valider les changements</button>
            </div>
        </form>

    </div>

    <div class="modifinfo-div">

        <button type="submit" class="btn btn-dark">modifier mes informations</button>
        <button type="submit" class="btn btn-dark">modifier mon adresse</button>
        <button type="submit" class="btn btn-dark">voir mes commandes</button>

    </div>


</body>

</html>