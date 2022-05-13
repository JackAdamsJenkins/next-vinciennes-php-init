<?php 
/*
    Avec PHP, vous allez parfois avoir besoin de stocker des données sur la machine du client
    Par exemple : lors de la connexion à un site

    Pour cela, vous avez 2 possibilités
        - Les cookies
        - les variables de session

    En autonomie, vous allez devoir trouver comment on utiliser ces deux types de variables.

    Ensuite, vous allez les mettre en application.

    Par exemple :
        - Vous réalisez un formulaire de connexion (sur une page spécifique)
        - Vous affichez "Bonjour +prénom" sur UNE AUTRE PAGE
            - Sans envoyer cette valeur par l'url ou la méthode post

    Page formulaire :
        - mail
        - mot de passe
        Une fois que le mail et le mot de passe ont été vérifier, récupérer de la base de données le prénom
        et ajoutez le sur les cookies ou les session

    Page dashboard :
        - Vous récupérez uniquement le prénom de la personne.
*/
?>