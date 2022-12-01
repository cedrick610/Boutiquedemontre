<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid-div">
      <a class="navbar-brand" href="#">Boutique de montre</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.php">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Commandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gammes.php">gammes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <h5>Formulaire</h5>



  <form action="connexion.php"  method="post" class="row g-3">
    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">nom</label>
      <input type="text" class="form-control" id="validationDefault01" name="nom" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">prenom</label>
      <input type="text" class="form-control" id="validationDefault02" name="prenom" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault03" class="form-label">adresse</label>
      <input type="text" class="form-control" id="validationDefault02" name="adresse" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefault04" class="form-label">code_postal</label>
      <input type="text" class="form-control" id="validationDefault02" name="code_postal" required>
    </div>
    <div class="col-md-6">
      <label for="validationDefault04" class="form-label">ville</label>
      <input type="text" class="form-control" name="ville" id="validationDefault03" required>
    </div>
    <div class="col-md-4">
      <label for="validationDefaultUsername" class="form-label">email</label>
      <div class="input-group">
        <span class="input-group-text" id="inputGroupPrepend2">@</span>
        <input type="email" class="form-control" name="email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">mot_de_passe</label>
      <input type="password" class="form-control" name="mot_de_passe" required>
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
        <label class="form-check-label" for="invalidCheck2">
          J'accepte les termes des conditions
        </label>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">envoyer</button>
    </div>
  </form>




 

</body>

</html>