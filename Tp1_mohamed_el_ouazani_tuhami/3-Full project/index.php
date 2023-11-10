<?php
require_once('DAOs.php');

// Example usage of ClientDAO
$clientDAO = new ClientDAO();

// Get all clients
$clients = $clientDAO->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Management</title>
</head>
<body>

    <h2>List of Clients</h2>
    <ul>
        <?php foreach ($clients as $client): ?>
            <li><?= "{$client->nom} {$client->prenom} - <a href='views/view_client.php?id={$client->id}'>View Details</a>" ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    // Get all client IDs for the dropdown menu
    $clientIds = array_column($clients, 'id');
    ?>

    <h2>Select Client by ID</h2>
    <form action="views/view_client.php" method="get">
        <label for="clientId">Choose a client ID:</label>
        <select name="id" id="clientId">
            <?php foreach ($clientIds as $clientId): ?>
                <option value="<?= $clientId ?>"><?= $clientId ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="View Details">
    </form>
    <!-- Navigation Links -->
    <h2>Insert Data</h2>
    <ul>
        <li><a href="views/insert_banque.php">Insert Banque Data</a></li>
        <li><a href="views/insert_client.php">Insert Client Data</a></li>
        <li><a href="views/insert_agence.php">Insert Agence Data</a></li>
    </ul>
</body>
</html>
