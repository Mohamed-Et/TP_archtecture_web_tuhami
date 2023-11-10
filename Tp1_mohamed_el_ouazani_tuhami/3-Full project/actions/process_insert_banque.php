<?php
require_once('../DAOs.php');
require_once('../DTOs.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['code_postal'];
    $ville = $_POST['ville'];

    // Create a BanqueDTO object
    $banqueDTO = new BanqueDTO();
    $banqueDTO->nom = $nom;
    $banqueDTO->adresse = $adresse;
    $banqueDTO->code_postal = $codePostal;
    $banqueDTO->ville = $ville;

    // Insert the Banque data into the database
    $banqueDAO = new BanqueDAO();
    $result = $banqueDAO->save($banqueDTO);

    // Check the result and redirect accordingly
    if ($result) {
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
