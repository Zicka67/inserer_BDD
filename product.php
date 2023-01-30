<?php
session_start(); //Cette ligne démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Cette ligne inclut le fichier functions.php dans le code actuel.
require_once('db-functions.php');//Cette ligne inclut le fichier db-functions.php dans le code actuel, mais qu'une seule fois.

$product = findOneById($_GET['id']);
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
			<a href="index.php">
				<i class="fa fa-home"></i>
			</a>
			<ul>
				<li>
					<a href="index.php">INDEX</a>
				</li>
				<li>
					<a href="recap.php">RÉCAP</a>
				</li>
			</ul>
			<a href="recap.php" <?php if (nbProduits() == null || nbProduits() == 0) {
									echo "style= 'display: none'";
								} ?>>
				<i class="fa fa-shopping-cart"></i>
				<p id="shoppingCart"><?= nbProduits() ?></p>
			</a>
		</nav>
	</header>
	<main>
		<div id="container">
			<article id="productFocus">
				<div id="productIMG">
					<img src="<?= $product['img'] ?>" alt="">
				</div>
				<div id="productInfo">
					
					<h1><?= ucFirst($product['name']) ?></h1>
					
					<p id="productPrice"><?= $product['price'] ?> €</p>
					
					<p class='description'><?= ucFirst($product['description']) ?></p>
					
					<div id="actionProduct">

						<a href="index.php">Retour</a>
						
						<div>
						<i class="fa fa-shopping-cart"></i>
							<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>
							
						</div>
					</div>
				</div>

			</article>
		</div>
	</main>
</body>



</html>