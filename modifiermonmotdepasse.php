

<?php
session_start();
include("function.php");

?>
<?php
include('./head.php');
?>
<?php

if (isset($_POST['mot_de_passe'])){
    modifMotDePasse();
}

if (isset($_POST['mot_de-passe_actuel'])){
     modifMotDePasse();
}

?>


<body>
    <div class="modifmotdepasse">
        <h5>Modifier mon mot de passe</h5>
    </div>


    <div class="container w-50 border border-dark bg-light mb-4 p-5">


        <form action="modifiermonmotdepasse.php" method="post">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ancien mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="mot_de_passe_actuel" placeholder="mot de passe actuel"  required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">nouveau mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="nouveau_mot_de_passe" placeholder="nouveau mot de passe " required>
            </div>


            <div class="modifmotdepasse">
            <button type="submit" name="validation" class="btn btn-dark">valider</button>
            </div>

           
        </form>


    </div>

    <div class="modifmotdepasse-div">
        <button type="submit" class="btn btn-dark">modifier mes informations</button>
        <button type="submit" class="btn btn-dark">modifier mon adresse</button>
        <button type="submit" class="btn btn-dark">voir mes commandes</button>

    </div>

</body>

</html>