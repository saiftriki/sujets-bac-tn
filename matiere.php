<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujets de Baccalauréat Tunisiens</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header-container">
                <div class="logo-container">
                    <img src="LogoM-E.png" class="logo" alt="ME">
                </div>
                
                <h1><i class="fas fa-graduation-cap"></i> Sujets de Baccalauréat Tunisiens</h1>
                
                <nav>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="about.html">À propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <main>
            <!-- Main content -->
            <section id="subjects" class="subjects">
                
                <div class="subject-container">
                    <?php
                    $sections = [
                        'informatique' => ['mathématiques','sciences physiques', 'anglais',  'arabe', 'français', 'philosophie', 'algorithmes', 'sti'],
                        'mathématiques' => ['mathématiques','informatique','sciences physiques','sciences de la vie et de la terre', 'anglais',  'arabe', 'français', 'philosophie'],
                        'économie' => ['mathématiques','informatique','économie','gestion','hist et géo', 'anglais',  'arabe', 'français', 'philosophie'],
                        'sciences' => ['mathématiques','informatique','sciences physiques','sciences de la vie et de la terre', 'anglais',  'arabe', 'français', 'philosophie'],
                        'technique' => ['mathématiques','informatique','techniques','sciences physiques', 'anglais',  'arabe', 'français', 'philosophie'],
                        'lettres' => ['mathématiques','informatique','hist et géo','anglais','arabe', 'français', 'philosophie','Pensée islamique'],
                        'sport' => ['mathématiques','informatique','sciences physiques','sciences de la vie et de la terre', 'anglais',  'arabe', 'français', 'philosophie','sport']
                        
                    ];

                    // Check if section parameter is set in URL
                    if (isset($_GET['section']) && array_key_exists($_GET['section'], $sections)) {
                        $section = $_GET['section'];
                        $subjects = $sections[$section];

                        // Loop through subjects and display as links or buttons
                        foreach ($subjects as $subject) {
                            echo '<a href="annees.php?section=' . urlencode($section) . '&subject=' . urlencode($subject) . '" class="subject-link">' . htmlspecialchars($subject) . '</a><br>';
                        }
                    } else {
                        echo 'Section not found.';
                    }
                   

                    ?>
                </div>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2024 Sujets de Baccalauréat Tunisiens</p>
        </footer>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
