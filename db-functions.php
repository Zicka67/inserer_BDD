<?php

function connexion() {
try
{
$db = new PDO(
    'mysql:host=localhost;dbname=store_gk;charset=utf8',
    'root',
    '',
    [
        
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //Cette option précise le type d'erreur que PDO renverra en cas de requête invalide.
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, //Cette définit le mode de récupération des données de la base par défaut. 
        // Ici, PDO renverra les données sous forme de tableau associatif (FETCH_ASSOC).
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8' //Cette définit le mode de récupération des données de la base par défaut. Ici, PDO 
        // renverra les données sous forme de tableau associatif (FETCH_ASSOC).
    ]
);
}
    //S'il y a une erreur, il rentre dans le bloc catch et fait ce qu'on lui demande (ici, on arrête l'exécution de la page en affichant un message décrivant l'erreur).
    //Si au contraire tout se passe bien, PHP poursuit l'exécution du code et ne lit pas ce qu'il y a dans le bloc catch  . Votre page PHP ne devrait donc rien afficher pour le moment.
    catch (Exception $e) 
    {
        die('Erreur : ' . $e->getMessage());
    }

}

function findAll()
{
    $db = dbFunction();

    $sqlQuery = 'SELECT * FROM product';
   
   
}




















?>