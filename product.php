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

    <title>Product</title>

</head>

<body>  
    <div>

    <?php
        require_once('db-functions.php'); 
        $product=findOneById ($_GET["id"]);  
    ?>
        <article class="container-product"> 
                
                        <div>
                            <img class="resize" src="img\shutterstock_575378506 (1).jpg" alt=""> 
                        </div>

                        <div>
                            <p><?= $article['name']; ?> €</p>
                            <p><?= $article['description']; ?> €</p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere consectetur nihil totam quidem asperiores. Praesentium sit porro culpa ipsum velit consequatur dignissimos, alias reprehenderit illo tempora itaque cumque facilis! Corporis!</p>
                            <p><?= $article['price']; ?> €</p>

                            <form action="traitement.php?action=ajouterProduit" method="post">
	                        <p>
			                <input type="submit" name="submit" value="Ajouter le produit" class="p-3 mb-2 btn btn-outline-info">
		                    </p>
                            <a href="http://localhost/inserer_BDD/index.php">retour</a>
                            <br><br>
                        </div>
                    </a>
         </article>



</body>

</html>