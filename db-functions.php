<?php

function dbFunction() {
try
{
    // On se connecte à MySQL
$sqlClient = new PDO(
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

    } catch (Exception $e) 
    {
        	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }

}

function findAll()
{
    $sqlClient = new PDO(
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

    $sqlRequest = 'SELECT * FROM product';
    $storeStatement = $sqlClient->prepare($sqlRequest);
    $storeStatement->execute();
    $store = $storeStatement->fetchAll(); //fetch=va chercher
    return $store;

    
 }
 // Celle-ci renverra le produit répondant à l'identifiant $id en paramètre.
 function findOneById($id)
 {
     $sqlClient = new PDO(
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
 
     $sqlRequest = 'SELECT * FROM product WHERE id= :id';
     $storeStatement = $sqlClient->prepare($sqlRequest);
     $storeStatement->execute();
     $store = $storeStatement->fetch(); //fetch=va chercher
     return $store;
 
     
  }




?>
<!--
function insertProduct($name, $descr, $price)
{
//     Cette dernière fonction insérera en base de données un nouvel enregistrement dans la table 
// product doté du nom $name, de la description $descr et du prix $price souhaités en paramètres.

} -->




















