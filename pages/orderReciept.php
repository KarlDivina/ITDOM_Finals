<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finish Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="midterm.css">
</head>
<body class="container-fluid">
    <div>
        <div class="col-12" >
            <h1 class="header-text">
                <a href="Midterm.php">
                    <img src="../assets/logo.png" class="row logo" width="250" height="150" text-align="center">
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
                            <a class="nav-link active" aria-current="page" href="#">Cart</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Take a break and have a McDonald's merienda! I'm lovin' it!</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <form
        method="post"
        action="homePage.php"
    >
        <div class="row">
            <div class="col-12">
                <div class="row item_order">
                    <div class="">
                        <h4 class=""><?php finishOrder();?></h4>
                        <?php printTotal();?>
                        <input 
                            type="submit"
                            name="clear_order"
                            class="btn btn-primary"
                            value="Finish Order"
                        />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST[$_SESSION['FUNCTIONS']["F2"]])){
                if (empty($_POST[$_SESSION['FUNCTIONS']["F3"]])){
                    clearOrder();
                } else {
                } 
            } else {
                removeItem();
            }
        }

        function removeItem(){
            $currentOrder = $_SESSION['CURRENT_ORDER'];
            array_pop($currentOrder);
            $_SESSION['CURRENT_ORDER'] = $currentOrder;
            if (count($currentOrder) != 0){
                printArray($currentOrder);
            }
        }

        function finishOrder(){
            if(!empty($_SESSION['CURRENT_ORDER'])){
                $orderValue = $_SESSION['CURRENT_ORDER'];
                printArray($orderValue);
                calculateTotal();
            } else {
                echo("<h4> Cart is still empty... Add some items! </h4>");
            }
        }

        function printArray($Array){
            $MENU_ITEMS = $_SESSION['MENU_ITEMS'];
            $arrLength = count($Array);
            for($x = 0; $x < $arrLength; $x++){
                echo("<h4>");
                echo $MENU_ITEMS[$Array[$x]]['longname'];
                echo "\n";
                echo $MENU_ITEMS[$Array[$x]]['price'];
                echo "<br>";
                echo("</h4>");
            }
            echo "<br>";
        }  
 
        function printTotal(){
            $TOTAL_PRICE = $_SESSION['TOTAL_PRICE'];
            if ($TOTAL_PRICE != 0){
                echo ("<p> TOTAL: ₱$TOTAL_PRICE </p>");
            }
        } 

        function calculateTotal(){
            $orderValue = $_SESSION['CURRENT_ORDER'];
            $MENU_ITEMS = $_SESSION['MENU_ITEMS'];
            $arrLength = count($orderValue);
            $TOTAL_PRICE = 0;
            for($x = 0; $x < $arrLength; $x++){
                $itemPrice = $MENU_ITEMS[$orderValue[$x]]['price'];
                $TOTAL_PRICE += $itemPrice;
            }
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