<?php 
    session_start();

    $TOTAL_PRICE = $_SESSION['TOTAL_PRICE'];
    $CURRENT_ORDER = $_SESSION['CURRENT_ORDER']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="midterm.css">
</head>
<body class="container-fluid">
    <div>
        <div class="col-12" >
            <h1 class="header-text">
                <a href="homePage.php">
                    <img src="../assets/logo.png" class="row logo" text-align="center">
                </a>
                McDonald's
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="Midterm.php"><img src="../assets/logo.png" class="navbar-logo" text-align="center"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="orderReciept.php">Cart</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Take a break and have a McDonald's merienda! I'm lovin' it!</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (array_key_exists($_SESSION['FUNCTIONS']["F9"], $_POST)){
                $MENU_ITEMS = $_SESSION["MENU_ITEMS"];
                $item = $_POST[$_SESSION['FUNCTIONS']["F9"]];
            } 
        }
    ?>
    <form
        method="post"
        action="homePage.php"
    >
        <div class="row">
            <div class="col-12">
                <div class="row item_order">
                    <div class="col-4 card">
                        <div class="order_image card-img-top">
                            <?php
                                echo ("<img src=".getImage($item, $MENU_ITEMS).">");
                            ?>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo ("<h4>".getName($item, $MENU_ITEMS)."</h4>")?></h4>
                            <p class="card-text"><?php echo ("<p>".getPrice($item, $MENU_ITEMS)."</p>") ?></p>
                            <input 
                                type="hidden"
                                name="add_item"
                                value=<?php echo("$item");?>
                            />
                            <input 
                                type="submit"
                                class="btn btn-primary"
                                value="Add to Cart"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST[$_SESSION['FUNCTIONS']["F1"]])){
                $newItem = $_POST[$_SESSION['FUNCTIONS']["F1"]];
                if (array_key_exists($_SESSION['FUNCTIONS']["F1"], $_POST)){
                    addItem($newItem);
                }
            }
        }

        function addItem($addValue){
            array_push($_SESSION['CURRENT_ORDER'], $addValue);
        }

        function calculateTotal($itemPrice){
            $TOTAL_PRICE = $_SESSION['TOTAL_PRICE'];
            $TOTAL_PRICE += $itemPrice;
            $_SESSION['TOTAL_PRICE'] = $TOTAL_PRICE;
        }

        function getName($item, $MENU_ITEMS){
            $itemName = $MENU_ITEMS[$item]['longname'];
            return($itemName);
        }
        function getPrice($item, $MENU_ITEMS){
            $itemPrice = $MENU_ITEMS[$item]['price'];
            return($itemPrice);
        }
        function getImage($item, $MENU_ITEMS){
            $itemImage = $MENU_ITEMS[$item]['image'];
            return($itemImage);
        }    
    ?>
</body>
</html>