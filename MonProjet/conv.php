<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <fieldset>
<?php


if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['nombre_dheure']))

{
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['nombre_dheure'])) 
        {
            $Nom=htmlspecialchars($_POST['nom']);
            $Prenom=htmlspecialchars($_POST['prenom']);
            $NombredHeure=htmlspecialchars($_POST['nombre_dheure']);

            echo "<h3> Bonjour <strong><em> $Nom $Prenom </em></strong> ,</h3> <br> <br> Vous avez suivi <strong><em> $NombredHeure </em></strong> heures de formation chez FormationPlus. <br> Pouvez-vous nous retourner ce mail avec la pièce jointe signée. <br><br><br> Cordialement, <br> FormationPlus";
        }
    }  
}
?>
</fieldset>
<ul><li><a href="index.html">Insertion aux BDD</a></li></ul>
    </body>
    </html>