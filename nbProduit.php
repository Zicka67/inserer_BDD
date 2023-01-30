<?php

function nbProduits()
{
	if (isset($_SESSION["products"]) && !empty($_SESSION["products"])) { //Cette ligne vérifie si la variable de session $_SESSION["products"] existe et n'est pas vide.
		$totalProduct = 0; // Initialise $totalProduct à 0
		foreach ($_SESSION["products"] as $product) { //Parcours chaque $product dans le tab $_SESSION["products"]
			while ($product['qtt'] > 0) {// tant que le $produit est sup à 0
				$product['qtt']--;// décrémente
				$totalProduct++; //pour chaque tour de boucle, incrémente
			}
		}
		echo " " . $totalProduct;
	}
}
