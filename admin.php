<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">


    <title>Admin</title>

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

    <!-- <div class="fruits-container">
        <div class="fruits">
            <h1>Pommes</h1> 
            <img src="img\shutterstock_575378506 (1).jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi impedit repellendus laborum aliquam aliquid possimus, porro quaerat, reprehenderit velit, culpa iusto assumenda voluptates doloribus consequatur ab. Dolor deserunt ab optio?</p>
            <a class="button" href='traitement.php?action=addQtt&id=$recap'>
                <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
            </a>
        </div>
        
        
        <div class="fruits">
            <h1>Bananes</h1>
            <img src="img\iStock_000007671231Large-e1565725651658-700x700.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi impedit repellendus laborum aliquam aliquid possimus, porro quaerat, reprehenderit velit, culpa iusto assumenda voluptates doloribus consequatur ab. Dolor deserunt ab optio?</p>
            <a class="button" href="http://localhost/PHP-PANIER/index.php">
                <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
            </a>
        </div>

        <div class="fruits">
       
            <h1>Cerises</h1>
            <img src="img\téléchargement.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi impedit repellendus laborum aliquam aliquid possimus, porro quaerat, reprehenderit velit, culpa iusto assumenda voluptates doloribus consequatur ab. Dolor deserunt ab optio?</p>
            <a class="button" href="http://localhost/PHP-PANIER/index.php">
                <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
            </a>
        </div>

        <div class="fruits">
            <h1>Oranges</h1>
            <img src="img\téléchargement (1).jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi impedit repellendus laborum aliquam aliquid possimus, porro quaerat, reprehenderit velit, culpa iusto assumenda voluptates doloribus consequatur ab. Dolor deserunt ab optio?</p>
            <a class="button" href="http://localhost/PHP-PANIER/index.php">
                <input class="panier-input" type="submit" name="submit" value="Ajouter le produit">
            </a>
        </div>
    </div> -->



</body>

</html>