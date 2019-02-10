<!DOCTYPE html>
<body lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Solaire17</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    
    <!-- FONT -->   
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
   

</head>
<body>
        <header class="header headerfaq">
                <section>
                    <section class="barre">
                        <ul>
                            <li><p><i class="far fa-envelope"></i></p></li>
                            <li><p><a href="index.html"><img src="img/solairelogo.png" alt="logo solaire 17" /></a></p></li>
                            <div class="infosheader">
                                <li><input type="text" name="recherche" class="fa" placeholder="&#xf002" /></li>
                                <li><p><i class="fas fa-phone"></i>0606060606</p></li>
                            </div>
                            <li><p><i class="fas fa-bars"></i></p></li>
                        </ul>
                    </section>
                    <h1>Votre production</h1>
                </section>
        
                <nav>
                        <ul>
                            <li><a href="index.html">Accueil<span></span></a></li>
                            <li><a href="entreprise.html">L'Entreprise<span></span></a></li>
                            <li><a href="prestations.html">Nos préstations<span></span></a></li>
                            <li><a href="independance.html">Indépendances énergétiques<span></span></a></li>
                            <li><a href="sav.html">S.A.V / Maintenance<span></span></a></li>
                            <li><a href="contact.html">Contact<span></span></a></li>
                        </ul>
                </nav>
                
            </header>
            <main class="blocresultat">
                    <?php
                        $departement = isset($_POST['departement']) ? $_POST['departement'] : NULL;
                        $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
                        $installation = isset($_POST['installation']) ? $_POST['installation'] : NULL;
                        $exposition = isset($_POST['exposition']) ? $_POST['exposition'] : NULL;
                        $ombrage = isset($_POST['ombrage']) ? $_POST['ombrage'] : NULL;
                        $toiture = isset($_POST['toiture']) ? $_POST['toiture'] : NULL;
                        $couverture_1 = isset($_POST['couverture_1']) ? $_POST['couverture_1'] : NULL;
                        $couverture_2 = isset($_POST['couverture_2']) ? $_POST['couverture_2'] : NULL;
                        $surface = isset($_POST['surface']) ? $_POST['surface'] : NULL;
                        $etages = isset($_POST['etages']) ? $_POST['etages'] : NULL;

                        if($departement == "" || $ville == "" || $installation == "" || $exposition == "" || $ombrage == "" || $toiture == "" || $couverture_1 == "" || $couverture_2 == "" || $surface == "" || $etages == ""){
                            $message = "ERREUR ! Veuillez remplir entièrement le formulaire !";
                        }
                        else{

                        if($exposition =='Sud'){
                            $exp = '1';
                        }
                        else if($exposition == 'Sud-Est ou Sud-Ouest'){
                            $exp = '2';
                        }
                        else if($exposition == 'Est ou Ouest'){
                            $exp = '3';
                        }
                        else{
                            $message = 'ERREUR';
                        }

                        if($toiture =='18%'){
                            $inclinaison = '1';
                        }
                        else if($toiture == '30%'){
                            $inclinaison = '2';
                        }
                        else if($toiture == '58%'){
                            $inclinaison = '3';
                        }
                        else if($toiture == '119%'){
                            $inclinaison = '4';
                        }
                        else{
                            $message = 'ERREUR';
                        }

                        // Déclaration des paramètres de connexion
                        $host ="mysql5-4.perso";
                        $user = "solairez1717";
                        $bdd = "solairez1717";
                        $passwd  = "MLsolaireDOM";

                        // Connexion au serveur
                        mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");

                        $req0 = mysql_query("SELECT * FROM production WHERE ville = '".$ville."' AND orientation='".$exp."' AND inclinaison='".$inclinaison."'");
                        if ($ligne0 = mysql_fetch_array($req0)) {
                        $laproduction = $ligne0["production"]; 
                        $rayonnement = $ligne0["rayonnement"]; 
                        }

                        $gain=$laproduction*0.2794;
                        $co2=$laproduction*0.0005;
                    
                        if($message==""){
                    ?>
                    <section class="resultatproduction">
                    <p>Votre production d’électricité sera d’environ <span><?=$laproduction ?> KWh / an</span>. </p>
                    <p>Ce qui correspond à <span><?=number_format($gain, 2, ',', ' ')?> € / an </span> si vous souhaitez revendre votre future production, pour une installation intégrée en toiture de 3000 Watt crêtes.</p>
                    <p>Cette production économisera environ <span><?=number_format($co2, 2, ',', ' ') ?> CO² / an</span> (conversion KWh en CO² selon calcul proposé par l’ADEME). </p>
                    <p>Cette estimation ne prend pas en compte les ombres sur votre toiture, il est nécessaire d’effectuer un masque solaire pour définir les pertes éventuelles, merci de prendre contact avec nous pour prendre un rendez-vous.</p>
                    <p>L’installation de panneaux solaires dans le cadre d’entreprise, GAEC, associations, ou grosses installations de particulier nécessite une estimation plus précise. Les aides admissibles sont différentes d’un cas à l’autre, il est donc important, pour constituer un projet, de rencontrer notre spécialise du solaire photovoltaïque. Il pourra vous conseiller techniquement et économiquement. Vous pouvez nous contacter pour prendre rendez-vous.</p>
                    </section>
                    <?php }
                    else{
                        echo $message;
                    }
                }
                    echo $message;
                    ?>
            </main>
            <footer>
                    <section>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <p>Lorem ipsum dolor sit amet</p>
                    </section>
                    <section>
                        <div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <a href="">Contactez-moi !</a>
                            <a href="">04 05 06 07 08</a>
                            <p>Solaire 17<span>14 Rue du Colonel Michon</span><span>17000 LA ROCHELLE</span></p>
                        </div>
                    </section>
            </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            </body>
            </html>