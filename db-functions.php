<?php

function connexion() {

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




















?>