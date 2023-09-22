<?php
include("connexion.php");

// Récupérer les données du formulaire POST
$matricule = $_POST['matricule'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$date_naissance = $_POST['date_naissance'];
$telephone = $_POST['telephone'];

// Effectuer une requête SQL INSERT
$insert_query = "INSERT INTO etudiants (matricule, nom, prenom, sexe, date_naissance, telephone) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $connexion->prepare($insert_query);
$stmt->bind_param("ssssss", $matricule, $nom, $prenom, $sexe, $date_naissance, $telephone);
if ($stmt->execute()) {
    // Rediriger vers la page de liste des étudiants
    header("Location: liste_etudiants.php");
} else {
    echo "Erreur lors de l'ajout de l'étudiant : " . $connexion->error;
}
$stmt->close();
