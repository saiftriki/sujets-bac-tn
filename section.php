<?php
$section = $_GET['section'];
// Connectez-vous à la base de données et récupérez les matières et les PDF pour la section sélectionnée
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($section); ?> - Sujets de Baccalauréat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sujets de Baccalauréat en <?php echo ucfirst($section); ?></h1>
    </header>
    <main>
        <section id="matieres">
            <h2>Matières Disponibles</h2>
            <ul>
                <!-- Affichez les matières et les liens vers les PDF ici -->
            </ul>
        </section>
    </main>
</body>
</html>
