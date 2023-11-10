<?php
require_once('../DAOs.php');

// Check if the client ID is provided in the query parameters
if (isset($_GET['id'])) {
    $clientId = $_GET['id'];

    // Example usage of ClientDAO
    $clientDAO = new ClientDAO();

    // Get the client details by ID
    $client = $clientDAO->getById($clientId);

    // Check if the client was found
    if ($client) {
        // Display client details
        echo "<h2>Client Details</h2>";
        echo "<p>Name: {$client->nom} {$client->prenom}</p>";
        echo "<p>Date of Birth: {$client->dateNaissance}</p>";
        echo "<p>Address: {$client->adresse}, {$client->codePostal}, {$client->ville}</p>";
        echo "<p>Phone: {$client->telephone}</p>";
        echo "<p>Email: {$client->email}</p>";
        echo "<p>Assigned Agence ID: {$client->idAgence}</p>";

        // Add more details as needed
    } else {
        // Handle the case where the client with the given ID was not found
        echo "Client not found!";
    }
} else {
    // Handle the case where the client ID is not provided in the query parameters
    echo "Client ID not specified!";
}
?>
