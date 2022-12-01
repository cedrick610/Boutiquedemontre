<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/2257fb6199.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<html>
<body>
 


  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid-div">
      <a class="navbar-brand" href="#"><img src=".\images\1vec.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gammes.php">Gammes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.php">Panier</a>
          </li>
          <?php if (isset($_SESSION['id'])) {

            echo
            "<li class=\"nav-item\">
<a class=\"nav-link\" href=\"profil.php\">Mon compte</a>
</li>
        <li><form action=\"index.php\" method=\"post\"><button type=\"submit\" name=\"deconnexion\">deconnexion</button>
        </form></li>";
          } else {

            echo
            "<li class=\"nav-item\">
<a class=\"nav-link\" href=\"connexion.php\">Connexion</a>
</li>";
          }

          ?>
        </ul>
      </div>
    </div>
  </nav>


  <footer>
  
  </footer>
</body>

</html>