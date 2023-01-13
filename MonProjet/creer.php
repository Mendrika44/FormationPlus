<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "formationplus";

$connection = new mysqli($servername, $username, $password, $database);

$nom = "";
$prenom = "";
$mail = "";
$convention = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $convention = $_POST['convention'];

    do {
        if ( empty($nom) || empty($prenom) || empty($mail) || empty($convention) ) {
            $errorMessage = "Tous les champs sont obligatoire";
            break;
        }

        $sql = "INSERT INTO etudiants (nom, prenom, mail, convention) " . 
                "VALUES ('$nom', '$prenom', '$mail', '$convention')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $nom = "";
        $prenom = "";
        $mail = "";
        $convention = "";

        $successMessage = "Etudiant ajouté correctement";

        header('location: /monprojet/index.php');
        exit;

    } while (false); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nouveau étudiant</h2>

        <?php
        if ( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom</label>
            <div class="col-sm-6">

            <input type="text" class="form-control" name="nom" value="<?php echo $nom;?>">
                </div>
                </div>
                
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prénom</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="prenom" value="<?php echo $prenom;?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="mail" value="<?php echo $mail;?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Convention</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="convention" value="<?php echo $convention;?>">
            </div>
            </div>

            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class= 'row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'</button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/monprojet/index.php" role="button">Retour</a>
            </div>
            </div>
        </form>
    </div>
</body>
</html>