<?php
session_start();
require_once "connexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    if (empty($login) || empty($password)) {

        $_SESSION["empty_input"] = "les données d’authentification sont obligatoires";

        header("Location: authentification.php");
        die();
    }

    if (!isset($_SESSION["empty_input"])) {

        $query = "SELECT * FROM compteadminstrateur WHERE login = :login;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":login", $login);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($result["login"] == $login && $result["password"] == $password) {
            $_SESSION["login"] = $login;
            header("Location: espaceprivee.php");
        } else {
            $_SESSION["empty_input"] = "les données d’authentification sont incorrects";
        }
    }

}


