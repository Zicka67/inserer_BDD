<?php
session_start();
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

            $store = findAll();

            foreach ($store as $article) {
            ?>
                <article>
                    <a href="product.php?id=<?= $article['id'] ?>">
                        <div>                         
                            <img  class="" src="<?= $article['photo'] ?>" alt="<?= ucFirst($article['name']) ?>">

                        </div>
                    </a>
                        <div>
                            <?php //"<?=" va echo id de $article
                            ?>
                            <a href="product.php?id=<?= $article['id'] ?>"> <?= ucFirst($article['description']); ?></a>

                            <p><?= $article['price']; ?> €</p>
                        </div>
                    
                </article>
            <?php
            }
            ?>
        </div>
    </main>
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