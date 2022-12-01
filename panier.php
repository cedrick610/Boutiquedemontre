<?php
session_start();
include("function.php");

if (isset($_POST["chosenArticle"])) {
  $article = getArticleFromId($_POST["chosenArticle"]);
  ajouterArticle($article);
}

if (isset($_POST["deletedArticle"])) {
  supprimerArticle($_POST["deletedArticle"]);
}


if (isset($_POST["viderpanier"])) {
  viderPanier();
}


if (isset($_POST["quantity"])) {
  modifQuantite();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
  
</body>
</html>
<?php
include('./head.php');
?>

<body>

  <div class="container text-center">

    <?php
    foreach ($_SESSION["panier"] as $article) {
      echo


      "<div class=\"row row-cols-2 row-cols-lg-5 g-2 g-lg-3\"width: 5rem;\">
     <div class=\"col\">
     <img class=\"\" src=\"images/" . $article['image'] . "\" alt=\"Card image cap\">
     </div>
     <div class=\"col\">
     <h5 class=\"\">${article['nom']}</h5>
     </div>
     <div class=\"col\">
     <p class=\"\">" . $article['description'] . "</p>
     </div>
     <div class=\"col\">
     <p class=\"\">" . $article['prix'] . " €</p>
     </div>
     <div class=\"col\">
     <form action=\"panier.php\" method=\"post\">
     <input type=\"hidden\" name=\"deletedArticle\" value=\"" . $article['id'] . "\">
     <input class=\"btn btn-dark mt-2\" type=\"submit\" value=\"supprimer article\">
    </form>
    <form action=\"panier.php\" method=\"post\">
    <input type=\"hidden\" name=\"articleModifie\" value=\"" . $article["id"] . "\">
    <label for=\"quantity\">Quantity:</label>
    <input type=\"number\" id=\"quantity\" name=\"quantity\" min=\"1\" max=\"10\">
    <input type=\"submit\" value=\"OK\">
  </form>
 
     </div>

   </div>
 </div>";
    }




    ?>



    <?php $total = totalPanier() ?>
    <div class="total"><?php echo totalPanier() ?> €</div>

  </div>
  <div class="btndanger">
    <form action="panier.php" method="post">
      <input type="hidden" name="viderpanier">
      <input class="btn btn-danger" type="submit" value="vider panier">
    </form>
  </div>



  <div class="validation">
    <a href="validation.php"><button type="button" class="btn btn-dark">Valider la commande </button></a>
  </div>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>