
<?php
function getConnection()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=boutiqueenligne;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC)
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}





function showArticles($articles)
{


    foreach ($articles as $article) {
        echo "<div class=\"card col-md-4 p-3 m-3\" style=\"width: 20rem;\">
        <img class=\"card-img-top\" src=\"images/" . $article['image'] . "\" alt=\"Card image cap\">
        <div class=\"card-body\">
            <h5 class=\"card-title font-weight-bold\">${article['nom']}</h5>
            <p class=\"card-text font-italic\">" . $article['description'] . "</p>
            <p class=\"ca
            rd-text font-weight-light\">" . $article['prix'] . " €</p>
            <form action=\"product.php\" method=\"post\">
                <input type=\"hidden\" name=\"articleToDisplay\" value=\"" . $article['id'] . "\">
                <input class=\"btn btn-light\" type=\"submit\" value=\"Détails produit\">
            </form>
            <form action=\"panier.php\" method=\"post\">
                <input type=\"hidden\" name=\"chosenArticle\" value=\"" . $article['id'] . "\">
                <input class=\"btn btn-dark mt-2\" type=\"submit\" value=\"Ajouter au panier\">
            </form>
        </div>
    </div>";
    }
}


// ****************** récupérer un article à partir de son id **********************

function getArticleFromId($id)
{
    foreach (getArticles() as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
}









function getArticles()
{
    $db = getConnection();
    $query = $db->query('SELECT * FROM articles');
    return $query->fetchAll();
}
/*-----creationpanier---------*/



function creationPanier()
{
    if (!isset($_SESSION['panier']));
    $_SESSION["panier"] = array();
}






/*-----ajoutpanier---------*/


function ajouterArticle($article)
{

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($article["id"] == $_SESSION["panier"][$i]["id"]) {
            echo "<script> alert(\"Article déjà présent dans le panier !\");</script>";
            return;
        }
    }

    $article["qte"] = 1;
    array_push($_SESSION["panier"], $article);
}


/*-----supprimerpanier---------*/


function supprimerArticle($article)
{
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"]) {
            array_splice($_SESSION["panier"], $i, 1);
            echo "<script> alert(\"Article supprimé !\");</script>";
            return;
        }
    }
}



/*-----vider le panier---------*/

function viderPanier()
{
    $_SESSION["panier"] = [];
    echo "<script> alert(\"panier vide !\");</script>";
}



/*-----modifier le panier---------*/


function modifQuantite()
{
    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $_POST["articleModifie"]) {
            $_SESSION["panier"][$i]["qte"] = $_POST["quantity"];
        }
    }
}



/*-----total panier---------*/

function totalPanier()
{
    $totalPanier = 0;

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {

        $totalPanier += $_SESSION["panier"][$i]["qte"] * $_SESSION["panier"][$i]["prix"];
    }
    return $totalPanier;
}



/*-----frais de port---------*/


function calculFraisport()
{
    $qteTotale = 0;
    foreach ($_SESSION["panier"] as $article) {
        $qteTotale += $article["qte"];
    }
    return $qteTotale * 3;
}



/*------totalgeneral--------*/

function totalGeneral()
{

    return totalPanier() + calculFraisport();
}


/*------afficher la date de livraison--------*/

function showShippingDate()
{
    // date affichée ainsi : 6 juin 2021
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $date = date("Y-m-d");
    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 1 day")));
}

/*------afficher la date de livraison-------*/


function showDeliveryDate()
{
    echo utf8_encode(strftime("%A %d %B %Y", strtotime(date("Y-m-d") . " + 5 days")));
}









/*------recuperer la liste des gammes -------*/

function recupereGammes()
{
    $db = getConnection();
    $query = $db->query('SELECT * FROM gammes');
    return $query->fetchAll();
}




/*------affiche  des gammes -------*/



function affichegammes()
{
    $gammes = recupereGammes();

    foreach ($gammes as $gamme) {
        echo '<h2>' . $gamme['nom'] . '</h2>';
        $articlesGamme = getArticlesByRange($gamme['id']);

        echo "<div class=\"container p-5\">
<div class=\"row text-center justify-content-center\">";

        showArticles($articlesGamme);

        echo "</div>
</div>";
    }
}



// ****************** récupérer la liste des articles par gamme **********************

function getArticlesByRange($rangeId)
{
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM Articles WHERE id_gamme = :id_gamme');
    $query->execute(array(
        'id_gamme' => $rangeId
    ));
    return $query->fetchAll();
}





function creerUtilisateur()
{

    $db = getConnection();

    if (emptyImputs()) { // vérification des champs vides
        echo "Attention un ou plusieurs champs sont vides!";
    } else {
        if (!verifLongueurChamps()) {  // vérification de la longueur de champs
            echo "Attention longueur d'un ou plusieurs champs incorrecte !";
        } else {

            // //if (checkEmail($_POST['email'])) {
            //     echo "Attention email déja utilisé !";
            // } else {
            if (!checkPassword($_POST['mot_de_passe'])) {
                echo "Mots de passe pas assez sûr !";
            } else {

                // hash du mot de passe

                $hashedPassword = password_hash(strip_tags($_POST['mot_de_passe']), PASSWORD_DEFAULT);
                // insertion de l'utilisateur en base de données

                $query = $db->prepare('INSERT INTO clients (nom, prenom, email, mot_de_passe) VALUES(:nom, :prenom, :email, :mot_de_passe)');
                $query->execute([
                    'nom' => strip_tags($_POST['nom']),
                    'prenom' => strip_tags($_POST['prenom']),
                    'email' => strip_tags($_POST['email']),
                    'mot_de_passe' => $hashedPassword
                ]);

                // Recuperation de l'id

                $id = $db->lastInsertId();

                // insertion de l'adresse

                $query = $db->prepare('INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(:id_client, :adresse, :code_postal, :ville)');
                $query->execute([
                    'id_client' => $id,
                    'adresse' => strip_tags($_POST['adresse']),
                    'code_postal' => strip_tags($_POST['code_postal']),
                    'ville' => strip_tags($_POST['ville'])
                ]);

                echo "Le compte a bien été créé";
            }
        }
    }
}
// }
function emptyImputs()
{
    foreach ($_POST as $input) {
        if (empty($input)) {
            return true;
        }
    }

    return false;
}


function verifLongueurChamps()
{
    $inputsLenghtOk = true;

    if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['code_postal']) !== 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3) {
        $inputsLenghtOk = false;
    }

    return $inputsLenghtOk;
}




// ***************** vérifier que l'e-mail est déjà utilisé ************************

function checkEmail($email)
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $user = $query->execute([$email]);

    if ($user) {
        return true;
    } else {
        return false;
    }
}


// ***************** vérifier le mot de passe ************************

function checkPassword($password)
{
    // minimum 8 caractères et maximum 15, minimum 1 lettre, 1 chiffre et 1 caractère spécial
    $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%*?/&])(?=\S+$).{8,15}$^";
    return preg_match($regex, $password);
}


// ***************** connexion ************************

function connexion()
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $query->execute([strip_tags($_POST['email'])]);
    $user = $query->fetch();


    if (!$user) {
        echo "L'utilisateur n'existe pas !";
    } else {
        if (password_verify($_POST['password'], $user['mot_de_passe'])) {
            echo "Accès autorisé !";
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            setSessionAddress();
        } else {
            echo "Mot de passe erroné !";
        }
    }
}


// ***************** récupérer l'adresse du client en bdd ************************

function getUserAdress()
{
    $db = getConnection();

    $query = $db->prepare('SELECT * FROM adresses WHERE id_client = ?');
    $query->execute([$_SESSION['id']]);
    return $query->fetch();
}



// ***************** définir / mettre à jour l'adresse de la session ************************

function setSessionAddress()
{
    $_SESSION['adresse'] = getUserAdress();
}


// ***************** se déconnecter  ************************

function logOut()
{
    $_SESSION = array();
    echo '<script>alert(\'Vous avez bien été déconnecté !\')</script>';
}


//******************modifierinfos/


function modifInfo()
{

    $db = getConnection();

    if (!emptyImputs()) { // vérification des champs vides
        echo "Attention un ou plusieurs champs sont vides!";
    } else {
        $query = $db->prepare('UPDATE clients SET prenom = :prenom, nom = :nom, email = :email');
        $query->execute([
            'nom' => strip_tags($_POST['nom']),
            'prenom' => strip_tags($_POST['prenom']),
            'email' => strip_tags($_POST['email'])
        ]);

        echo '<script>alert(\'Votre modification est bien enregistrée !\')</script>';
    }
}


//******************modifieradresse/

function modifiAdresse()
{

    $db = getConnection();

    if (emptyImputs()) { // vérification des champs vides
        echo "Attention un ou plusieurs champs sont vides!";
    } else {
        $query = $db->prepare('UPDATE adresses SET adresse = :adresse, code_postal = :code_postal, ville =
         :ville WHERE id_client = :id_client');
        $query->execute([
            'adresse' =>  strip_tags($_POST['adresse']),
            'code_postal' =>  strip_tags($_POST['code_postal']),
            'ville' =>  strip_tags($_POST['ville']),
            'id_client' =>  $_SESSION['id']
        ]);

        echo '<script>alert(\'Votre adresse a bien été modifiée !\')</script>';
    }
}



//******************modifiermotdepasse/

function modifMotDePasse()
{

    $db = getConnection();

    if (emptyImputs()) { // vérification des champs vides
        echo '<script>alert(\'Attention un ou plusieurs champs sont vides!\')</script>';
    } else { // récupération dans la db 
        $query = $db->prepare('SELECT mot_de_passe FROM clients WHERE id_client = ?');
        $query->execute([

            $_SESSION['id']
        ]); 
        $user = $query->fetch();
    }
    // vérification si le mot de passe est éronné, on renvois un message d'erreur. 



    if (password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
        echo '<script>alert(\'Attention, mot de passe erroné!\')</script>';
        // sinon on autorise la modification

    } else {
        $query = $db->prepare('UPDATE clients SET mot_de_passe = :mot_de_passe, WHERE id = :id');
        $query->execute([
            'mot_de_passe' => password_hash(strip_tags($_POST['mot_de_passe']), PASSWORD_DEFAULT),
            'id' => $_SESSION['id']

        ]);
        echo '<script>alert(\' Le mot de passe a bien été modifié!\')</script>';
    }
}





// **************************************************** COMMANDES ***********************************************************

// ***************** récupérer la liste des commandes  ************************

function getCommandes()
{
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM commande WHERE id_client = ? ORDER BY date_commande DESC');
    $query->execute([$_SESSION['id']]);
    return $query->fetchAll();
}

// ***************** récupérer les articles de chaque commande  ************************

function getcommandeArticles($orderId)
{
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM commande_articles ca INNER JOIN articles a ON a.id = ca.id_article WHERE id_commande = ?');
    $query->execute([$orderId]);
    return $query->fetchAll();
}

?>