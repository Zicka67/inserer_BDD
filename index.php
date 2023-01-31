<?php
session_start(); //Cette instruction démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Cette ligne inclut le fichier functions.php dans le code actuel.
require_once('db-functions.php');//Cette ligne inclut le fichier db-functions.php dans le code actuel, mais qu'une seule fois.
?>

<!DOCTYPE html>

<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Index</title>

</head>

<body>

    
 <!-- <?php spl_autoload_register(function ($class_name) {
                require_once $class_name . '.php';
            });
            ?>  -->

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
            <img src="img\panier.png" alt="">
            <div class="centrer">
                <?php

                if (isset($_SESSION["products"])) {
                    $panier_count = count($_SESSION["products"]);

                    echo "&nbsp Articles : " . $panier_count;
                } else {
                    echo "&nbsp Article : 0";
                }
                ?>
            </div>
        </ul>
    </nav>

    <div>
            <?php
            require_once('db-functions.php');

            $db = findAll();
        
            foreach ($db as $produit) {
            ?>
                <article>
                <a href="product.php?id=<?= $produit['id'] ?>">   
                        <div>                         
                            <img src="<?= $produit['photo'] ?>" alt="<?= ucFirst($produit['name']) ?>">
                            <a href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">
                            </a>
                                <div>
                                    <?= ucFirst($produit['name'])?> 
                        </div>
                    
                    <div>
                            <?= $produit['description']?>
                    </div>
                        <div>
                            <?php //"<?=" va echo id de $produit
                            ?>
                            <!-- <a href="product.php?id=<?= $produit['id'] ?>"> <?= ucFirst($produit['description']); ?></a> -->
                            <p><?= $produit['price']; ?> €</p>
                            
                            <a href="traitement.php?action=addToCart&id=<?= $produit['id'] ?>">Test</a>
                            
						    </form>
                        </div>
                </article>
            <?php
            }
            ?>
        </div>


    </body>

    <?php
    $message = (isset($_SESSION['message'])) ? $_SESSION['message'] : null;
                echo $message;
                unset($_SESSION['message']);
    ?>


    </div>

    <div class="container">
        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=addProduct" method="post">
            <!-- action => indique la cible du formulaire, le fichier a atteindre quand le user soumet le form -->
            <p> <!-- method => précise la méthode HTTP de transmission au serveur, des données du form -->
                <label>
                    Nom du produit :
                    <input class="margin1" type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input class="margin2" type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input class="margin3" type="number" name="qtt" value="">
                </label>
            </p>

            <a class="button" href="">
                <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
            </a>

        </form>

    </div>

    <div class="flex">
        <div class="container2">
            <div class="fruits-container">
                <div>
                    <h1>Pommes</h1>
                    <img src="img\shutterstock_575378506 (1).jpg" alt="">
                </div>

                <form action="traitement.php?action=addProduct" method="post">
                    <div class="style-fruits">
                        <label>

                            <label>
                                Quantité désirée :
                                <input class="margin3" type="number" name="qtt" value="">
                            </label>
                    </div>

                    <a class="button" href="">
                        <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
                    </a>
                </form>
            </div>
        </div>

        <div class="container2">
            <div class="fruits-container">
                <div>
                    <h1>Oranges</h1>
                    <img src="img\téléchargement (1).jpg" alt="">
                </div>

                <form action="traitement.php?action=addProduct" method="post">
                    <div class="style-fruits">
                        <label>

                            <label>
                                Quantité désirée :
                                <input class="margin3" type="number" name="qtt" value="">
                            </label>
                    </div>

                    <a class="button" href="">
                        <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
                    </a>
                </form>
            </div>
        </div>

        <div class="container2">
            <div class="fruits-container">
                <div>
                    <h1>Cerises</h1>
                    <img src="img\téléchargement.jpg" alt="">
                </div>

                <form action="traitement.php?action=addProduct" method="post">
                    <div class="style-fruits">
                        <label>

                            <label>
                                Quantité désirée :
                                <input class="margin3" type="number" name="qtt" value="">
                            </label>
                    </div>

                    <a class="button" href="">
                        <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
                    </a>
                </form>
            </div>
        </div>

        <div class="container2">
            <div class="fruits-container">
                <div>
                    <h1>banane</h1>
                    <img src="img\iStock_000007671231Large-e1565725651658-700x700.jpg" alt="">
                </div>

                <form action="traitement.php?action=addProduct" method="post">
                    <div class="style-fruits">
                        <label>

                            <label>
                                Quantité désirée :
                                <input class="margin3" type="number" name="qtt" value="">
                            </label>
                    </div>

                    <a class="button" href="">
                        <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
                    </a>
                </form>
            </div>
        </div>
    </div>


</body>

</html>