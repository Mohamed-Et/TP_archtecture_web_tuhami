<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Banque Data</title>
</head>
<body>
    <h1>Insert Banque Data</h1>
    <form action="../actions/process_insert_banque.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" required><br>

        <label for="code_postal">Code Postal:</label>
        <input type="text" name="code_postal" required><br>

        <label for="ville">Ville:</label>
        <input type="text" name="ville" required><br>

        <input type="submit" value="Insert">
    </form>
</body>
</html>
