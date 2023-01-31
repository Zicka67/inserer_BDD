<?php
session_start(); //Cette ligne démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Cette ligne inclut le fichier functions.php dans le code actuel.
require_once('db-functions.php');//Cette ligne inclut le fichier db-functions.php dans le code actuel, mais qu'une seule fois.

$produit = findOneById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">

<title>Product</title>
</head>

<body>  
<header>
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
	</header>
	<main>
		<div>
			<article>
				<div>
					<img src="<?= $produit['photo'] ?>" alt="">
				</div>
				<div>
					
					<h1><?= ucFirst($produit['name']) ?></h1>
					
					<p><?= $produit['price'] ?> €</p>
					
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga harum vel totam temporibus atque repellat quos aperiam earum! Deleniti alias laboriosam ex facere mollitia, modi temporibus optio eum iste! Non?</p>
					
					<div>
						<div>
						<!-- <i></i> // image panier a mettre -->
						<form action="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>" method="post">
  						<input type="submit" value="Ajouter un produit">
						</form>


						<a href="index.php">Retour</a>

						</div>
					</div>
				</div>

			</article>
		</div>
	</main>
</body>



</html>