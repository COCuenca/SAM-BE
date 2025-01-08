<!DOCTYPE html>
<html>

<head>
    <title>Inside Out Memories</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif;
        }

        .w3-row-padding img {
            margin-bottom: 12px;
        }

        .w3-sidebar {
            width: 120px;
            background: #222;
        }

        #main {
            margin-left: 120px;
        }

        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0;
            }
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            width: 300px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            position: relative;
            height: 150px;
            overflow: hidden;
        }

        .card-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-header h2 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 10px;
            color: white;
            font-size: 20px;
            background: rgba(0, 0, 0, 0.6);
        }

        .card-body {
            padding: 15px;
        }

        .card-body p {
            margin: 0 0 10px;
            color: #555;
        }

        .card-footer {
            text-align: center;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 14px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #3498db;
            text-transform: uppercase;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .details {
            display: none;
            padding: 10px;
            border-top: 1px solid #eee;
            background-color: #f7f7f7;
        }

        .details img {
            width: 100%;
            max-width: 80px;
            margin-right: 10px;
            border-radius: 8px;
            vertical-align: middle;
        }

        .details p {
            display: inline-block;
            margin: 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>

<body class="w3-black">


    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-user w3-xxlarge"></i>
            <p>ABOUT</p>
        </a>
        <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-eye w3-xxlarge"></i>
            <p>MEMORIES</p>
        </a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-envelope w3-xxlarge"></i>
            <p>CONTACT</p>
        </a>
    </nav>

    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <!-- Header -->
        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
            <h1 class="w3-jumbo">Inside Out Memories</h1>
            <p>Explore your core memories!</p>
        </header>

        <!-- About Section -->
        <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
            <h2 class="w3-text-light-grey">About the Site</h2>
            <hr style="width:200px" class="w3-opacity">
            <p>This website showcases your core memories in a beautiful and interactive way. Navigate through your
                islands of personality to relive precious moments.</p>
        </div>

        <!-- Memories Section -->
        <div class="w3-padding-64 w3-content" id="photos">
            <h2 class="w3-text-light-grey">Islands of Personality</h2>
            <hr style="width:200px" class="w3-opacity">

            <div class="container">
                <?php
                // Database connection
                $host = '127.0.0.1';
                $db = 'corememories';
                $user = 'root';
                $pass = '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ];

                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);

                    // Fetch Islands of Personality
                    $stmt = $pdo->query('SELECT * FROM islandsofpersonality');
                    $islands = $stmt->fetchAll();

                    foreach ($islands as $island) {
                        // Fetch contents for the current island
                        $contentStmt = $pdo->prepare('SELECT * FROM islandcontents WHERE islandOfPersonalityID = :id');
                        $contentStmt->execute(['id' => $island['islandOfPersonalityID']]);
                        $contents = $contentStmt->fetchAll();

                        echo '<div class="card" style="border-left: 8px solid ' . htmlspecialchars($island['color']) . ';">';
                        echo '<div class="card-header">';
                        echo '<img src="images/' . htmlspecialchars($island['image']) . '" alt="' . htmlspecialchars($island['name']) . '">';
                        echo '<h2>' . htmlspecialchars($island['name']) . '</h2>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<p>' . htmlspecialchars($island['shortDescription']) . '</p>';
                        echo '<button class="button" onclick="toggleDetails(' . htmlspecialchars($island['islandOfPersonalityID']) . ')">View Contents</button>';
                        echo '</div>';
                        echo '<div id="details-' . htmlspecialchars($island['islandOfPersonalityID']) . '" class="details">';

                        foreach ($contents as $content) {
                            echo '<p><img src="images/' . htmlspecialchars($content['image']) . '" alt="' . htmlspecialchars($content['content']) . '"> ' . htmlspecialchars($content['content']) . '</p>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo '<p>Error connecting to database: ' . $e->getMessage() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
            <h2 class="w3-text-light-grey">Contact Me</h2>
            <hr style="width:200px" class="w3-opacity">
            <div class="w3-section">
                <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Maila, Philippines
                </p>
                <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: 09300324397</p>
                <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Email:
                    cuencachristianodchimar1220@gmail@mail.com</p>
            </div>
            <form action="/action_page.php" method="post">
                <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
                <p><input class="w3-input w3-padding-16" type="email" placeholder="Email" required name="Email"></p>
                <p><textarea class="w3-input w3-padding-16" placeholder="Message" required name="Message"></textarea>
                </p>
                <p><button class="w3-button w3-light-grey w3-padding-large" type="submit">
                        <i class="fa fa-paper-plane"></i> SEND MESSAGE
                    </button></p>
            </form>
        </div>

        <!-- Footer -->
        <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
            <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"
                    class="w3-hover-text-green">w3.css</a></p>
        </footer>

        <script>
            function toggleDetails(id) {
                const details = document.getElementById(`details-${id}`);
                details.style.display = details.style.display === 'block' ? 'none' : 'block';
            }
        </script>
    </div>
</body>

</html>