<?php
session_start();
require_once('db-functions.php'); //Cette ligne inclut le fichier db-functions.php dans le code actuel, mais qu'une seule fois.


switch ($_GET["action"]) {
    
    case "addProduct":
        
        if (isset($_POST["submit"])) {
            //Ce filtre supprime une chaine de caractère de tte présence de carac spéciaux et de balise HTML
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //Nouvelle version de FILTER_SANITIZE_STRING
            //Ce filtre validera le prix UNIQUEMENT si il est a virgule et FLAG = permet " , " et " . "
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            //Ce filtre ne validera la quantité UNIQUEMENT si le prix est un chiffre entier différent de 0
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
            
            if ($name && $price && $qtt) {
                $produit = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price * $qtt,
                ];
                $_SESSION["products"][] = $produit; //[] est un raccourci pour indiquer que nous ajoutons une nouvelle 
                //entrée au futur tab "products" associé a cette clé.
                // $_SESSION['message'] = "Le produit " . $produit['name'] . " a bien été ajouté au panier</p>";
                $_SESSION["message"] = "Le produit a été ajouté";
            } else {
                "Une erreur s'est produite";
            }
            
            header("Location: index.php"); //Redirige vers recap.php  
        }
        break;
        
        // Decrease Quantity product
        case "lowerQtt":
            if ($_SESSION['products'][$_GET['id']]['qtt'] > 1) { // Si la qtt dans le tab products et > 1 ALORS
                $_SESSION['products'][$_GET['id']]['qtt']--; // On baisse de 1 la qtt ET
                $_SESSION['products'][$_GET['id']]['total'] -= $_SESSION['products'][$_GET['id']]['price'];// On soustrait le total, du prix du product
            } else {
                $_SESSION['messageError'] = "<div class='test' ><p class=''>Le produit " . ucfirst($_SESSION["products"][$_GET["id"]]["name"]) . " a été retiré de la liste</p></div>";
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
                
                
                // Delete 1 produit 
                case "deleteProduct":
                    unset($_SESSION['products'][$_GET['id']]); //unset($_SESSION['products'][$_GET['index']]['total']);
                    header("Location: recap.php"); //Redirige vers recap.php
                    die;
                    break;
                    
                    // Delete panier
                    case "deletePanier":
                        unset($_SESSION["products"]); // $_get va prendre comme paramètre ici id qu'on va mettre ligne 55 dans le recap
                        // $_SESSION['message'] = "<p>Le produit " . $produit['name'] . " a bien été supprimé</p>"; // POUR LE MESSAGE DU PANIER
                        header("Location: recap.php"); //Redirige vers recap.php
                        die;
                        break;
                        
                        // Ajouter au panier

                        case "addToCart":
                            if (!isset($_GET['id'])) {
                              header("Location:index.php");
                              die;
                            }
                          
                            if (isset($_SESSION['products']) && $_SESSION['products'] != null) {
                              foreach ($_SESSION['products'] as $index => $product) {
                                if ($product['id'] == $_GET['id']) {
                                  $_SESSION['products'][$index]['qtt']++;
                                  $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $_SESSION['products'][$index]['price'];
                                  header("Location:index.php");
                                  die;
                                }
                              }
                            }
                          
                            $product = findOneById($_GET['id']);
                            $product['qtt'] = 1;
                            $product['total'] = $product['price'];
                            $_SESSION["products"][] = $product;
                            $_SESSION['messageAdding'] = "Le produit a bien été ajouté";
                            header("Location:index.php");
                            die;
                            break;
                        }

                        //Ancienne version de addToCart le problème étant l'ajout du produit si il existe déjà dans le panier. Soit ca me redirige 
                        //soit ca me redirigie pas mais les produits ne s'aditionnent pas, j'avais 3 pommes séparées et pas ensemble
                        
                        // case "addToCart":
                        //     if (!isset($_GET['id'])) {
                        //         header("Location:index.php");
                        //         die;
                        //     }
                        //     if (isset($_SESSION['products']) && $_SESSION['products'] != null) { //Cette ligne vérifie si la variable de session $_SESSION['products'] existe, ce qui indique que des produits ont déjà été ajoutés au panier.
                        //         foreach ($_SESSION['products'] as $index => $produit) { //Si la variable de session existe, cette instruction passe à travers les produits déjà présents dans le panier.
                        //             if ($produit['id'] == $_GET['id']) { // === pour corriger ? //Pour chaque produit, cette instruction vérifie si l'identifiant de ce produit correspond à celui qui est envoyé par l'URL ($_GET['id']).
                        //                 header("Location:traitement.php?action=addQtt&id=" . $index); //Si l'identifiant correspond, cette instruction redirige l'utilisateur vers une autre page (traitement.php) avec l'action "addQtt" et l'index du produit trouvé.
                        //                 die;
                        //             }
                        //         }
                        //     }
                        //     $produit = findOneById($_GET['id']); // Si aucun produit n'a été trouvé avec l'identifiant envoyé, cette instruction appelle la fonction findOneById pour trouver le produit correspondant à l'identifiant.
                        //     $produit['qtt'] = 1; //Cette instruction initialise la quantité du produit à 1.
                        //     $produit['total'] = $produit['price']; //Cette instruction initialise le total du produit en fonction de son prix.
                        //     $_SESSION["products"][] = $produit; //Cette instruction ajoute le produit au panier en stockant les informations dans la variable de session $_SESSION["products"].
                        //     header("Location:index.php"); // Enfin, cette instruction redirige l'utilisateur vers la page de récapitulation (recap.php).
                        //     die;
                        //     break;
                            
                            
                        // }
                        
                        
                        
                        
                        ?>
                        
                        </body>
                        
                        </html>