<?php
session_start();//Cette instruction démarre une nouvelle session ou reprend une session existante pour cet utilisateur.
include "nbProduit.php"; //Création d'un fichier a part pour cette function, en la mettant dans db-function ca bug
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Recap des produits</title>

</head>

<body>

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
    // Soit clé "produits" du tab de session n'existe pas : !isset()
    if (!isset($_SESSION["products"]) || empty($_SESSION["products"])) { // soit cette clé existe mais est vide : empty()
       
        echo "<p> Aucun produit en session ... </p>";
        // unset($_SESSION['message']);
    } else {
        echo "<table>",
            "<thead>",
            "<tr>",
            "<th>#</th>",
            "<th>Nom</th>",
            "<th>Prix</th>",
            "<th>Quantité</th>",
            "<th>Total</th>",
            "</tr>",
            "</thead>",
            "<tbody>";

        $totalGeneral = 0;

        foreach ($_SESSION["products"] as $index => $product) {
            echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product["name"] . "</td>",
                "<td>" . number_format($product["price"], 2, ",", "") . " €</td>",
                //dans la ligne suivante id est lié a $_GET['id'] si $_GET['id'] serait $_GET['lol'], id ici serait lol
                "<td><a class='test' href='traitement.php?action=lowerQtt&id=$index'> - </a>" . $product["qtt"] . "<a class='test2' href='traitement.php?action=addQtt&id=$index'> + </a>" . "<a href='traitement.php?action=" . $index . "'></a></td>",
                "<td>" . number_format($product["total"], 2, ",", "") . " € </a>" . "<a href='traitement.php?action=deleteProduct&id=" . $index . "'> <img src='img\poubelle.png' alt=''/> </a></td>",
                "</tr>";
            $totalGeneral += $product["total"];
        }
        echo "<tr>",
            "<td colspan=4>Total général : </td>",
            "<td><strong>" . number_format($totalGeneral, 2, "," , "") . " €</strong></td>",
            "<tr>",
            "</tbody>",
            "</table>";
    }
   
    ?>
    <a class="panier-input2" href="traitement.php?action=deletePanier">Supprimer le panier</a>



</body>

</html>