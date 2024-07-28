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
            <section id="years">
                <div id="loading" style="display:none;">Loading...</div>
                <h2>Années Disponibles</h2>
                <div class="year-container">
                    <?php
                    if (isset($_GET['section']) && isset($_GET['subject'])) {
                        $section = $_GET['section'];
                        $subject = $_GET['subject'];

                        $years = ['2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'];
                        //$years = array_reverse($years);
                        
                        foreach ($years as $year) {
                            echo '<a href="#" class="year-link" data-section="' . htmlspecialchars($section) . '" data-subject="' . htmlspecialchars($subject) . '" data-year="' . htmlspecialchars($year) . '">' . htmlspecialchars($year) . '</a><br>';
                        }
                    } else {
                        echo 'Section ou matière introuvable.';
                    }
                    ?>
                </div>
            </section>
            <section id="subjects" class="subjects">
                <!-- Dynamic content will be loaded here -->
            </section>
        </main>
        
        <footer>
            <p>&copy; 2024 Sujets de Baccalauréat Tunisiens</p>
        </footer>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
