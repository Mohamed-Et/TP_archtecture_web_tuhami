<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Client Data</title>
</head>
<body>
    <h1>Insert Client Data</h1>
    <form action="../actions/process_insert_client.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" name="date_naissance" required><br>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" required><br>

        <label for="code_postal">Code Postal:</label>
        <input type="text" name="code_postal" required><br>

        <label for="ville">Ville:</label>
        <input type="text" name="ville" required><br>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="id_agence">ID Agence:</label>
        <input type="text" name="id_agence" required><br>

        <input type="submit" value="Insert">
    </form>
</body>
</html>
