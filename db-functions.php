<?php

//Etablir une connexion avec la base de donnée
function dbFunction() {
    try
    {
        // On se connecte à MySQL
        $db = new PDO(
            'mysql:host=localhost;dbname=store_gk;charset=utf8',
            'root',
            '',
            [
                
                //Cette option précise le type d'erreur que PDO renverra en cas de requête invalide.
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, 
                //Cette définit le mode de récupération des données de la base par défaut. Ici, PDO renverra les données sous forme de tableau associatif (FETCH_ASSOC).
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, 
                //Cette définit le mode de récupération des données de la base par défaut. Ici, PDO renverra les données sous forme de tableau associatif (FETCH_ASSOC).
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8' 
                ]
            );
            return $db;//return $db représente la connexion à la base de données MySQL. OBLIGATOIRE pour se lier a la base de donnée. A pas oublier comme la ...
        } catch (Exception $e)  
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
        
    }
    
    //****************************FINDALL**************************************

    function findAll()
    {
        $db = dbFunction(); //Cette ligne appelle la fonction dbFunction(), qui établit une connexion à la base de données $db
        
        $sqlRequest = 'SELECT * FROM product';
        $storeStatement = $db->prepare($sqlRequest);
        $storeStatement->execute();
        $store = $storeStatement->fetchAll(); //fetch = va chercher
        return $store;
    }
     
    //****************************FINDONEBYID**************************************

    // Celle-ci renverra le produit répondant à l'identifiant $id en paramètre.
    function findOneById($id)
    {
        $db = dbFunction(); //Cette ligne appelle la fonction dbFunction(), qui établit une connexion à la base de données $db
        
        $sqlRequest = 'SELECT * FROM product WHERE id= :id';
        $storeStatement = $db->prepare($sqlRequest);
        $storeStatement->execute([
            ':id' => $id,
        ]);
        $store = $storeStatement->fetch(); //fetch = va chercher
        return $store;
    }

     //***************************INSERTPRODUCT***************************************
    
    function insertProduct($name, $price, $description)
    {
    
        $db = dbFunction(); //Cette ligne appelle la fonction dbFunction(), qui établit une connexion à la base de données $db
    
        $sqlRequest = 'INSERT INTO product (name, price, description) /*Cette ligne insert un produit qui a un nom, prix et description*/
                    VALUES ( :name, :price, :description )'; //Les valeurs de ces colonnes sont des variables d'espace réservé.
    
        $storeStatement = $db->prepare($sqlRequest); /*Cette ligne prépare l'exécution de l'instruction SQL en appelant la méthode "prepare" sur l'objet de base de données ($db) et en lui transmettant l'instruction SQL en tant qu'argument. */
    
        //Cette ligne exécute l'instruction préparée en appelant la méthode "execute" sur l'objet instruction ($storeStatement) 
        //et en transmettant un tableau de valeurs pour remplacer les variables d'espace réservé dans l'instruction SQL.  
        //Les clés du tableau correspondent aux noms d'espace réservé utilisés dans l'instruction, 
        //et les valeurs correspondent aux variables passées à la fonction ( $name,  $price,  $description). 
        $storeStatement->execute([
            ':name' => $name,
            ':price' => $price,
            ':description' => $description
        ]);
    }
    