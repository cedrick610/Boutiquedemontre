<?php
session_start();
include('function.php');
include('./head.php');
if (isset($_POST["prenom"])){
  logOut();
}

?>

<?php

"<form action=\"index.php\" method=\"post\">
<div class=\"form-group col-md-6\">
<label for=\"inputFirstName\">Prénom</label>
<input name=\"firstName\" type=\"text\" class=\"form-control\" id=\"inputFirstName\" 
value=\"" . htmlspecialchars($_SESSION['prenom']) . "\" required>
</div>
</form>
<script>while (true) {alert(\"hello\")}</script>";
?>

