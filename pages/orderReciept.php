<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Multi : Order</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="midterm.css">
</head>
<body class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg" style="background-color: #004080;">
                <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="homePage.php">
                        <img src="../assets/logo.svg" alt="">
                    </a>
                </div>

                <div class="d-flex ms-auto order-5">   
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-light" aria-current="page" href="homePage.php" style="color: white; margin-right: 5px;">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Give us a review!</a>
                            </li> -->
                            <?php
                            checkAccess()
                        ?>
                    </ul>
                    </div>

                    <div class="navbar-header">
                        <button 
                            class="navbar-toggler" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" 
                            aria-expanded="false" 
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
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

        function clearOrder(){
            if(isset($_SESSION['CURRENT_ORDER'])){
                unset($_SESSION['CURRENT_ORDER']);
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

        function printTotal(){
            if (isset($_SESSION['TOTAL_PRICE'])){
                $TOTAL_PRICE = $_SESSION['TOTAL_PRICE'];
                echo ("<p> TOTAL: ₱$TOTAL_PRICE </p>");
            }
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
            
        function checkAccess(){
            if(isset($_SESSION['ACCESS'])){
                $userAccess = $_SESSION['ACCESS'];
                if($userAccess == "SUPER"){
                    //show add item + user
                } else if($userAccess == "ADMIN"){
                    echo ("
                        <form
                            method=\""."post\""."
                            action=\""."orderReciept.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <input type=\""."submit\""." class=\""."nav-link disabled btn btn-outline-light\""." name=\""."finish_order\""." value=\""."Cart\""." style=\""."color: gray; margin-right: 5px;\""."/>
                            </li>
                        </form>
                        <form
                            method=\""."post\""."
                            action=\""."homePage.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <input type=\""."submit\""." class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." name=\""."logout_user\""." value=\""."Sign out\""." style=\""."color: white; margin-right: 5px;\""."/>
                            </li>
                        </form>
                    ");
                    echo ("
                        <li class=\""."nav-item\"".">
                            <a class=\""." nav-link disabled active\""." aria-current=\""."page\""."> Welcome, ". $_SESSION['FULLNAME'] ."</a>
                        </li>
                    ");
                } else if($userAccess == "MEMBER"){
                    echo ("
                        <form
                            method=\""."post\""."
                            action=\""."orderReciept.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <a class=\""."nav-link disabled btn btn-outline-light\""." aria-current=\""."page\""." href=\""."loginPage.php\""." style=\""."color: white; margin-right: 5px;\""." >Cart</a>
                            </li>
                        </form>
                        <form
                            method=\""."post\""."
                            action=\""."homePage.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <input type=\""."submit\""." class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." name=\""."logout_user\""." value=\""."Sign out\""." style=\""."color: white; margin-right: 5px;\""." />
                            </li>
                        </form>
                        <li class=\""."nav-item\"".">
                            <a class=\""." nav-link disabled active\""." aria-current=\""."page\""." style=\""."color: white; margin-right: 5px;\""."> Welcome, ". $_SESSION['FULLNAME'] ."</a>
                        </li>
                    ");
                }
            } else {
                    echo ("
                        <form
                            method=\""."post\""."
                            action=\""."orderReciept.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <input type=\""."submit\""." class=\""."nav-link disabled active\""." name=\""."finish_order\""." value=\""."Cart\""." style=\""."color: white; margin-right: 5px;\""."/>
                            </li>
                        </form>
                        <a class=\""."nav-link\""." aria-current=\""."page\""." href=\""."loginPage.php\""." style=\""."color: white; margin-right: 5px;\"".">Sign in</a>
                    ");
                }
        }

        function reloadPage(){
            echo("<meta http-equiv='refresh' content='1'>");
        } 
    ?>
</body>
</html>