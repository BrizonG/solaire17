<!DOCTYPE html>
<html lang="en">
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
                    
                    
                    <h1>Contact</h1>
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
    $objet = isset($_POST['objet']) ? $_POST['objet'] : NULL;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $num = isset($_POST['num']) ? $_POST['num'] : NULL;
    $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
    $message = isset($_POST['message']) ? $_POST['message'] : NULL;

    $message_envoi = ' ';
    $message_erreur = ' ';

    $atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
    $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
                                   
    $regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
    '(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
                                    // séparés par des caractères autorisés avant l'arobase
    '@' .                           // Suivis d'un arobase
    '(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
                                    // séparés par des points
    $domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine

    if($nom == ''){
        $message_erreur = 'Entrez un nom !';
    }
    else if($objet == ''){
        $message_erreur = 'Sélectionner un objet !';
    }
    else if($email == ''){
        $message_erreur = 'Entrez une adresse mail !';
    }
    else if(!preg_match($regex, $email)){
        $message_erreur = 'Entrez une adresse mail valide !';
    }
    else if($num == ''){
        $message_erreur = 'Entrez un numéro de téléphone !';
    }
    else if($ville == ''){
        $message_erreur = 'Entrez votre ville / département !';
    }
    else if($message == ''){
        $message_erreur = 'Entrez un message !';
    }
    else{
    $sujet="Message Client : ".$objet." - ".$nom;
    $mailDestinataire ="guillaume.brizon@orange.fr";

    $from = "From: ".$email." ";
    $from .= " 1.0\nContent-Type: text/html; charset=UTF-8\n";
    $header=$sujet;

        $messageMail = "

            <div style='background-color:#1d4f92; height:100px; width:100%;'>
                <p style='color: white; text-align:center; padding-top: 20px; font-size:2vw;'>MESSAGE</p>
            </div>

            <div style='width:100%; text-align:center'>
                <h2 style='font-size:1.5vw'>Formulaire de contact:</h2><br>

                <p style='font-size:1vw'>Nom :   ".$nom."</p>
                <p style='font-size:1vw'>Email :   ".$email."</p>
                <p style='font-size:1vw'>Numéro :   ".$num."</p>
                <p style='font-size:1vw'>Ville / Département :   ".$ville."</p>
                <p style='font-size:1vw'>Objet :   ".$objet."</p>

                <p style='font-size:1vw'>----------- Message -----------</p>
                <p style='font-size:1vw'>".Stripslashes($_POST['message'])."</p>
                <p style='font-size:1vw'>---------------------------------------</p>
            </div>"
            ;

        mail($mailDestinataire, $sujet, $messageMail, $from);
        $message_envoi = 'Message envoyé !';
    }
?>

            <main>
                <section class="contact">
                    <section class="infoscontact">
                        <h2 class="titrecontact"><span></span>Plus d'informations</h2>
                        <h3 class="soustitrecontact">Remplisser ce formulaire de contact</h3>
                    </section>
                    <p class="erreur_form"><?= $message_erreur ?></p>
                    <p class="envoi_form"><?= $message_envoi ?></p>
                    <section class="formulairecontact">
                        <form class="formcontact" id="contact" method="post" action="traitement_form_contact.php">
                            <p>Objet<span>*</span></p>
                            <select id="objet" name="objet">
                                <option selected></option>
                                <option>Objet 1</option>
                                <option>Objet 2</option>
                                <option>Objet 3</option>
                                <option>Objet 4</option>
                            </select>
                            <p>Votre nom<span>*</span></p>
                            <input type="text" id="nom" name="nom"/>
                            <p>Votre email<span>*</span></p>
                            <input type="text" id="email" name="email"/>
                            <p>Votre numéro de téléphone<span>*</span></p>
                            <input type="text" id="num" name="num"/>
                            <p>Ville / Département<span>*</span></p>
                            <input type="text" id="ville" name="ville"/>
                            <p>Message<span>*</span></p>
                            <textarea id="message" name="message" placeholder="Entrez votre message"></textarea>
                            <div class="divbouton">
                                <button type="submit" name="envoi"><span>Envoyer</span></button>
                            </div>
                        </form>
                    </section>
                </section>
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