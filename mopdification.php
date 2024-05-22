<?php
require_once 'connexion.php';

if (!isset($_GET['id'])) {
    echo "ID non spécifié.";
    die();
}

$id = $_GET['id'];

$query = "SELECT nom, prenom, date_naissance, idFiliere FROM stagiaire WHERE idStiagiaire = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":id", $id);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $row = $result->fetch_assoc();
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $dateNaissance = $row["dateNaissance"];
    $idFiliere = $row["idFiliere"];
} else {
    echo "Stagiaire non trouvé.";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <a href="index.php" class="back_btn"> Retour</a>
        <h2>Modifier un Stagiaire</h2>
        <p class="erreur_message">
        </p>
        <p>Veuillez remplir tous les champs</p>
        
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Nom</label>
            <input type="text" name="nom" value="<?php echo $nom; ?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>">
            <label>Date de naissance</label>
            <input type="date" name="dateNaissance" value="<?php echo $dateNaissance; ?>">
            <label>FILIÈRE</label>
            <select name="idFiliere">
                <option value="1" <?php if ($idFiliere == 1) echo "selected"; ?>>Développement Digital</option>
                <option value="2" <?php if ($idFiliere == 2) echo "selected"; ?>>Infrastructure Digital</option>
            </select>
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>