<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormationPlus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Listes des étudiants</h2>
        <a class="btn btn-primary" href="/monprojet/creer.php" role="button">Nouveau étudiant</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Convention</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "formationplus";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error){
                    die("Connexion échouée: " .$connection->connect_error);
                }

                $sql = "SELECT * FROM etudiants";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Requête invalide: " .$connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                 <tr>
                    <td>$row[id]</td>
                    <td>$row[nom]</td>
                    <td>$row[prenom]</td>
                    <td>$row[mail]</td>
                    <td>$row[convention]</td>
                    <td>
                        <a class= 'btn btn-primary btn-sm' href='/monprojet/modifier.php?id=$row[id]'>Modifier</a>
                        <a class= 'btn btn-danger btn-sm' href='/monprojet/supprimer.php?id=$row[id]'>Supprimer</a>
                    </td>
                </tr>
                ";
                }
                ?>
                
                
            </tbody>
        </table>
    </div>    
</body>
</html>