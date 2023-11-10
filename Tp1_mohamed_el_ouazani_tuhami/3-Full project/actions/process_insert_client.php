<?php
require_once('../DAOs.php');
require_once('../DTOs.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $idAgence = $_POST['id_agence'];

    // Create a ClientDTO object
    $clientDTO = new ClientDTO();
    $clientDTO->nom = $nom;
    $clientDTO->prenom = $prenom;
    $clientDTO->dateNaissance = $dateNaissance;
    $clientDTO->adresse = $adresse;
    $clientDTO->codePostal = $codePostal;
    $clientDTO->ville = $ville;
    $clientDTO->telephone = $telephone;
    $clientDTO->email = $email;
    $clientDTO->idAgence = $idAgence;

    // Insert the client data into the database
    $clientDAO = new ClientDAO();
    $clientDAO->save($clientDTO);

     // Check the result and redirect accordingly
    if ($clientDAO) {
        // Insert successful, redirect to a confirmation page
        header('Location: ../views/confirmation_page.php');
        exit();
    } else {
        // Insert failed, redirect back to the form or display an error message
        header('Location: ../views/insert_banque_form.php');
        exit();
    }
}
?>
