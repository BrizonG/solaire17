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
                    <h1>Indépendances énergétiques</h1>
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


            <?php
                $surface = isset($_POST['surface']) ? $_POST['surface'] : NULL;
                $consommation = isset($_POST['consommation']) ? $_POST['consommation'] : NULL;
                $unité = isset($_POST['unité']) ? $_POST['unité'] : NULL;

                $message_envoi = ' ';
                $message_erreur = ' ';
                $gain = 0;

                function calculer($la_surface){
                    if ($la_surface == '10 à 20 m²'){
                        $production = 2565;
                    }
                    else if ($la_surface == '20 à 30 m²'){
                        $production = 4105;
                    }
                    else if ($la_surface == '30 à 40 m²'){
                        $production = 5820;
                    }
                    else if ($la_surface == '40 à 50 m²'){
                        $production = 7700;
                    }
                    else if ($la_surface == '50 à 60 m²'){
                        $production = 9425;
                    }
                    else if ($la_surface == '60 à 70 m²'){
                        $production = 11300;
                    }
                    else{
                        $message_erreur = 'Erreur lors du calcul';
                        $production = 'ERROR';
                    }
                    return $production;
                }

                if($surface == ''){
                    $message_erreur = 'Choisissez une surface !';
                }
                else if($consommation == ''){
                    $message_erreur = 'Entrez votre consommation !';
                }
                else if($unité == ''){
                    $message_erreur = 'Entrez une unité pour votre consommation !';
                }
                else{
                    $surface_calculee = calculer($surface);
                    if($surface_calculee !="ERROR"){
                        if($unité == 'kWh'){
                            $k = $consommation;
                        }
                        else if($unité == '€'){
                            $e = $consommation;
                            $k = $e / 0.13;
                        }
                        else{
                            $val = "ERROR";
                        }

                        $resultat = round(($surface_calculee/$k)*100);

                        if($resultat != INF && $resultat>100){
                            $g = ($surface_calculee - $k)* 0.2851;
                        }
                    }

                    if($resultat != INF && $resultat != ""){
                        $message_envoi = 'Votre futur taux d’indépendance énergétique est de : '.$resultat.' %';
                        if($g != ""){
                            $message_envoi = 'Votre futur taux d’indépendance énergétique est de : 100%. </br> Vos gains supplémentaires après déduction de la consommation par an est de : '.number_format($g, 2, ',', ' ').'€.';
                        }
                }
            }
            ?>

            <main class="bloc blocindependance">
                <form class="formindependance" method="post" action="independance.php"> 
                    <h2>Calculer de manière simple votre futur taux de dépendance énergétique.</h2>
                    <p class="form_p">Quel est votre surface disponible non ombragé côté sud ? ( pan de toiture, terrasse, façade, brise soleil, terrain... ) </p>
                    <select class="form_champ" id="surface" name="surface">
                        <option selected> </option>
                        <option>10 à 20 m²</option>
                        <option>20 à 30 m²</option>
                        <option>30 à 40 m²</option>
                        <option>40 à 50 m²</option>
                        <option>50 à 60 m²</option>
                        <option>60 à 70 m²</option>
                    </select>
                    <p class="form_p">Quelle est votre consommation annuelle d’électricité ? </p>
                    <input type="text"  id="consommation" name="consommation" class="form_champ"/>
                    <input type="radio" name="unité" value="kWh"/><label>kWh</label>
                    <input type="radio" name="unité" value="€"/><label>€</label>
                    <p class="erreur_form_indep"><?= $message_erreur ?></p>
                    <p class="envoi_form_indep"><?= $message_envoi ?></p>
                    <div class="divbouton">
                        <button type="submit" name="envoi"><span>Envoyer</span></button>
                    </div>
                </form>
                <article class="photoentreprise">
                    <p><img src="img/entreprise.png" alt="photoentreprise" /></p>
                </article>
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
            </body>
            </html>