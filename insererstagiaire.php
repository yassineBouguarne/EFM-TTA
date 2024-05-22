<?php

require_once "connexion.php";


$query = "SELECT id, name FROM filieres";
$result = $pdo->query($query);
$filieres = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $filieres[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['age'];
    $filiere = $_POST['filiere'];
    $photo_profil = $_FILES['photo_profil'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($photo_profil["name"]);
    move_uploaded_file($photo_profil["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO stagiaires (nom, prenom, date_naissance, filiere, photo_profil) VALUES (:nom, :prenom, :date_naissance, :filiere, :photo_profil);");
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":date_naissance", $date_naissance);
    $stmt->bindParam(":filiere", $filiere);
    $stmt->bindParam(":photo_profil", $photo_profil);

    $stmt->execute();
    header("Location: espaceprivee.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form">
        <a href="index.php" class="back_btn"> Retour</a>
        <h2>Ajouter un Stagiaire</h2>
        <p class="erreur_message"></p>
        <p>Veuillez remplir tou les champs</p>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nom</label>
            <input type="text" name="nom" required>
            <label>Prénom</label>
            <input type="text" name="prenom" required>
            <label>Date de naissance</label>
            <input type="date" name="age" required>
            <label for="photo_profil">PHOTO PROFIL</label>
            <input type="file" id="photo_profil" name="photo_profil" accept="image/*" required>
            <label>FILIÈRE</label>
            <select name="filiere" id="filiere" required>
                <?php foreach ($filieres as $filiere): ?>
                    <option value="<?= $filiere['id'] ?>"><?= $filiere['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>