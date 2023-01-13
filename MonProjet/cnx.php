<?php

$etudiant="root";
$mdp="";
$db="formationplus";
$server="localhost";

$link=mysqli_connect($server, $etudiant, $mdp, $db);

if($link){
    //echo "connexion établie";
}
else{
    die(mysqli_connect_error());
}
?>