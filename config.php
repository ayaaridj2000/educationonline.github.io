<?php
//infos identification
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','mySchool');
//connexion a BDD MySQL
$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
//verifier connexion
if ($conn===false){
    die("Erreur  ... Impossible de se connecter.! ").mysqli_connect_error();
}
?>