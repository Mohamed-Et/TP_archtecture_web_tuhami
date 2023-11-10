<?php
require_once('../DAOs.php');
require_once('../DTOs.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $id_banque = $_POST['id_banque'];

    // Create an AgenceDTO object
    $agenceDTO = new AgenceDTO();
    $agenceDTO->nom = $nom;
    $agenceDTO->adresse = $adresse;
    $agenceDTO->codePostal = $codePostal;
    $agenceDTO->ville = $ville;
    $agenceDTO->id_banque = $id_banque;

    // Insert the agence data into the database
    $agenceDAO = new AgenceDAO();
    $agenceDAO->save($agenceDTO);

    // Check the result and redirect accordingly
    if ($agenceDAO) {
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
