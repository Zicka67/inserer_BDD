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
				<!-- <i></i> image home a mettre -->
			</a>
			<ul>
				<li>
					<a href="index.php">INDEX</a>
				</li>
				<li>
					<a href="recap.php">RECAP</a>
				</li>
			</ul>
			<a href="recap.php" <?php if (nbProduits() == null || nbProduits() == 0) {
									echo "style= 'display: none'";
								} ?>>
				<!-- <i></i> // image panier a mettre -->
				<p><?= nbProduits() ?></p>
			</a>
		</nav>
	</header>
	<main>
		<div>
			<article>
				<div>
					<img src="<?= $product['photo'] ?>" alt="">
				</div>
				<div>
					
					<h1><?= ucFirst($product['name']) ?></h1>
					
					<p><?= $product['price'] ?> €</p>
					
					<p><?= ucFirst($product['description']) ?></p>
					
					<div>

						<a href="index.php">Retour</a>
						
						<div>
						<!-- <i></i> // image panier a mettre -->
							<a href="traitement.php?action=addToCart&id=<?= $_GET['id'] ?>">Ajouter un produit</a>
							
						</div>
					</div>
				</div>

			</article>
		</div>
	</main>
</body>



</html>