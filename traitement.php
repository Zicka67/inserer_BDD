<?php
session_start();


switch($_GET["action"]) {

    case "addProduct" :

        if(isset($_POST["submit"])) {
            //Ce filtre supprime une chaine de caractère de tte présence de carac spéciaux et de balise HTML
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Nouvelle version de FILTER_SANITIZE_STRING
            //Ce filtre validera le prix UNIQUEMENT si il est a virgule et FLAG = permet " , " et " . "
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            //Ce filtre ne validera la quantité UNIQUEMENT si le prix est un chiffre entier différent de 0
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
            if($name && $price && $qtt) {
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price*$qtt,
                ];
                $_SESSION["products"][] = $product;//[] est un raccourci pour indiquer que nous ajoutons une nouvelle 
                //entrée au futur tab "products" associé a cette clé.
                // $_SESSION['message'] = "Le produit " . $product['name'] . " a bien été ajouté au panier</p>";
                $_SESSION["message"] = "Le produit a été ajouté";
            }else {
                "Une erreur s'est produite";
            }

            header("Location: index.php"); //Redirige vers recap.php
        }
    break;

    // Decrease Quantity product
    case "lowerQtt":
        if($_SESSION['products'][$_GET['id']]['qtt'] > 1){
		$_SESSION['products'][$_GET['id']]['qtt']--;
        $_SESSION['products'][$_GET['id']]['total'] -= $_SESSION['products'][$_GET['id']]['price'];
    }else{
        unset($_SESSION['products'][$_GET['id']]);
    }
        header("Location: recap.php"); //Redirige vers recap.php
        die;
    break;

    // Increase Quantity product
    case "addQtt":
		$_SESSION['products'][$_GET['id']]['qtt']++;
        $_SESSION['products'][$_GET['id']]['total'] += $_SESSION['products'][$_GET['id']]['price'];
        header("Location: recap.php"); //Redirige vers recap.php
        die;
    break;


    // Delet panier
    case "deletePanier":
        unset($_SESSION['products'][$_GET['id']]); //unset($_SESSION['products'][$_GET['index']]['total']);
        header("Location: recap.php"); //Redirige vers recap.php
        die;
    break;

    // Delete all Qtt product
    case "deleteAll":
        unset($_SESSION["products"]); // $_get va prendre comme paramètre ici id qu'on va mettre ligne 55 dans le recap
        $_SESSION['message'] = "<p>Le produit " . $product['name'] . " a bien été supprimé</p>";
        header("Location: recap.php"); //Redirige vers recap.php
        die;
    break;


}




?>




<!-- // if(isset($_POST["action"]) && $_POST["action"] == "addProduct") {
//     $product = array(
//         "name" => $_POST["name"],
//         "price" => $_POST["price"],
//         "qtt" => $_POST["qtt"]
//     );

//     if(!isset($_SESSION["products"])) {
//         $_SESSION["products"] = array();
//     }

//     array_push($_SESSION["products"], $product);

//     if(!isset($_SESSION["total"])) {
//         $_SESSION["total"] = 0;
//     }

//     $_SESSION["total"] += ($_POST["price"] * $_POST["qtt"]);
// }

// redirect to recap page
// header("Location: recap.php"); -->
</body>

</html>





