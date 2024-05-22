<?php
require_once"connexion.php";
session_start();

if(!isset($_SESSION['login'])){
    header(('Location: espaceprivee.php'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epace prive</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Espace prive</h2>
        <button id="logoutButton"><a href="deconexion.php">Se Deconnecte</a>r</button>
    </header>
    <main>
        <div id="tii">
            <h2>
                <?php
                if(date('H') >= 6 && date('H') <= 18){
                    echo "Bonjour";
                } else{
                    echo "Bonsoir";
                }
                ?>
            </h2>
            <span id="duser" name="username">
                <?php echo $_SESSION['login']?>
            </span>
        </div>
        <button id="ajouterButton"><a href="insererstagiaire.php">Ajouter</a></button>
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Photo Profil</th>
                <th>Filiere</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            
            $query = "SELECT * FROM stagiaires;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $data){
                echo "<tr>
                <td>" . $data['Nom'] . "</td>
                <td>" . $data['Prenom'] . "</td>
                <td>" . $data['Date De naissance'] . "</td>
                <td>" . $data['photo Profil'] . "</td>
                <td>" . $data['Filiere'] . "</td>
                <td><a href='mopdification.php'>🖊</a> </td>
                <td><a href='supprimer.php.php'>🚮</a></td>
                </tr>";
            }
            ?>
        </table>
    </main>
</body>
</html>
