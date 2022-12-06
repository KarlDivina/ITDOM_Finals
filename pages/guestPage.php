<?php 
    session_start();

    $_SESSION['MENU_ITEMS'] = array(
        "T1" => [
            "longname" => "Men's Crew Neck Tee", 
            "price" => "349.75",
            "image" => "..\assets\_1_Mens_CrewNeckTee.jpg",
        ],
        "T2" => [
            "longname" => "Men's Polo Shirt", 
            "price" => "399.00",
            "image" => "..\assets\_2_Mens_PoloShirt.jpg",
        ],
        "T3" => [
            "longname" => "Men's Crew Neck Graphic Tee", 
            "price" => "399.75",
            "image" => "..\assets\_3_Mens_Crew_NeckGraphicTee.jpg",
        ],
        "T4" => [
            "longname" => "Men's Active Polo Shirt", 
            "price" => "599.75",
            "image" => "../assets/_4_Mens_ActivePoloShirt.jpg",
        ],
        "T5" => [
            "longname" => "Men's Short Sleeve Tee", 
            "price" => "399.00",
            "image" => "../assets/_5_Mens_ShortSleeveTee.jpg",
        ],
        "P1" => [
            "longname" => "Men's Colored Pants", 
            "price" => "799.75",
            "image" => "../assets/_6_Mens_ColoredPants.jpg",
        ],
        "P2" => [
            "longname" => "Men's Denim Pants", 
            "price" => "845.75",
            "image" => "../assets/_7_Mens_DenimPants.jpg",
        ],
        "P3" => [
            "longname" => "Men's Loungewear Pants", 
            "price" => "729.75",
            "image" => "../assets/_8_Mens_LoungewearPants.jpg",
        ],
        "P4" => [
            "longname" => "Men's Cargo Pants", 
            "price" => "1,099.75",
            "image" => "../assets/_9_Mens_CargoPants.jpg",
        ],
        "P5" => [
            "longname" => "Men's Jogging Pants", 
            "price" => "699.75",
            "image" => "../assets/_10_Mens_JoggingPants.jpg",
        ],
        "S1" => [
            "longname" => "Men's Swim Shorts", 
            "price" => "499.75",
            "image" => "../assets/_11_Mens_SwimShorts.jpg",
        ],
        "S2" => [
            "longname" => "Women's Beach Shorts", 
            "price" => "469.75",
            "image" => "../assets/_12_Womens_BeachShorts.jpg",
        ],
        "S3" => [
            "longname" => "Jun De Leon Women's Beach Shorts", 
            "price" => "374.81",
            "image" => "../assets/_13_Womens_BeachShorts.jpg",
        ],
        "S4" => [
            "longname" => "Patrick Uy Women's Beach Shorts", 
            "price" => "374.81",
            "image" => "../assets/_14_Womens_BeachShorts.jpg",
        ],
        "S5" => [
            "longname" => "Jun De Leon Men's Swim Shorts", 
            "price" => "487.31",
            "image" => "../assets/_15_Mens_SwimShorts.jpg",
        ],
        "H1" => [
            "longname" => "Men's Bucket Hat", 
            "price" => "399.75",
            "image" => "../assets/_16_Mens_BucketHat.jpg",
        ],
        "H2" => [
            "longname" => "Better Made X Stray Kids Men's Baseball Cap", 
            "price" => "399.75",
            "image" => "../assets/_17_Mens_BaseballCap.jpg",
        ],
        "H3" => [
            "longname" => "Men's Baseball Cap", 
            "price" => "349.75",
            "image" => "../assets/_18_Mans_Cap.jpg",
        ],
        // "H4" => [
        //     "longname" => "Bench Everyday Men's Cap", 
        //     "price" => "349.75",
        //     "image" => "../assets/McCafeIcedCoffeeVanilla.png",
        // ],
        "H5" => [
            "longname" => "Bench Everyday Men's Bonnet", 
            "price" => "429.75",
            "image" => "../assets/_20_Mens_Bonnet.jpg",
        ],
    );

    // shortname  -- change to category?
    // longname
    // price
    // image

    $_SESSION['FUNCTIONS'] = array(
        "F1" => "add_item",
        "F2" => "remove_item",
        "F3" => "finish_order",
        "F4" => "login_user",
        "F5" => "logout_user",
        "F9" => "order_item",
        "F0" => "clear_order",
    );

    $_SESSION['CREDENTIALS'] = array(
        0 => [
            "index" => 0,
            "name_full" => "Test Admin",
            "name_first" => "Test",
            "name_last" => "Admin",
            "username" => "testadmin",
            "password" => "adminpass",
            "access" => "ADMIN",
        ],
        1 => [
            "index" => 1,
            "name_full" => "Test Member",
            "name_first" => "Test",
            "name_last" => "Member",
            "username" => "testmember",
            "password" => "memberpass",
            "access" => "MEMBER",
        ],
        2 => [
            "index" => 2,
            "name_full" => "Test Super",
            "name_first" => "Test",
            "name_last" => "Super",
            "username" => "testsuper",
            "password" => "superpass",
            "access" => "SUPER",
        ],
    );

    if (!isset($_SESSION['CURRENT_ORDER'])){
        $_SESSION['CURRENT_ORDER'] = array();
    } else {
        $CURRENT_ORDER = $_SESSION['CURRENT_ORDER'];
    }
    if (!isset($_SESSION['TOTAL_PRICE'])){
        $_SESSION['TOTAL_PRICE'] = 0;
    } else {
        $TOTAL_PRICE = $_SESSION['TOTAL_PRICE'];
    }

    // index
    // name_full
    // name_first
    // name_last
    // access

// if access == null
// Login/Register

// if access == MEMBER
// none new

// if access == ADMIN
// CRUD Operation for Items

// ?
// if access == SUPER
// CRUD Operation for Items + Members
// ?

// navbar should change depending on status
// main should have option to edit when access == ADMIN
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Multi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="midterm.css">
</head>
<body class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="homePage.php">Navbar</a>
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
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homePage.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Give us a review!</a>
                    </li> -->
                    <?php
                        checkAccess()
                    ?>
                </ul>
                </div>
            </div>
            </nav>
        </div>
    </div>
    <section class="items">
        <?php
            $MENU_ITEMS = $_SESSION['MENU_ITEMS'];
            $CREDENTIALS = $_SESSION['CREDENTIALS'];

            function printItems() {
                $MENU_ITEMS = $_SESSION['MENU_ITEMS'];
                foreach ($MENU_ITEMS as $item => $menuItem){
                    $itemName = getName($menuItem);
                    $itemPrice = getPrice($menuItem);
                    $itemImage = getImage($menuItem);
                    
                    echo ("
                        <form 
                            method="."post"."
                            id="."menu"."
                            action="."./orderItem.php"."
                        >
                        <div class="."item".">
                            <div class="."row".">
                                <img src=".$itemImage.">
                            </div>
                            <div class="."row".">
                                <div class="."col-5".">
                                    <h4>".$itemName."</h4>
                                </div>
                                <div class="."col-2".">
                                    <h5>₱".$itemPrice.".00</h5>
                                </div>
                                <div class="."col-2".">
                                    <input 
                                        type="."hidden"."
                                        name="."order_item"."
                                        value="."$item"."
                                    />
                                    <input 
                                        type="."submit"."
                                        value="."Order"."
                                    /> 
                                </div>
                            </div>
                        </div>
                    </form>"
                    );
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST[$_SESSION['FUNCTIONS']["F1"]])){ //add_item
                    if (empty($_POST[$_SESSION['FUNCTIONS']["F2"]])){ //remove_item
                        if (empty($_POST[$_SESSION['FUNCTIONS']["F3"]])){ //order is complete?
                            if (empty($_POST[$_SESSION['FUNCTIONS']["F4"]])){ //login user
                                if (empty($_POST[$_SESSION['FUNCTIONS']["F5"]])){ //logout user
                                    clearOrder();
                                } else {
                                    logoutUser();
                                }
                            } else {
                                $providedUsername = $_POST['username'];
                                $providedPassword = $_POST['password'];
                                foreach ($CREDENTIALS as $user => $userDetails){
                                    if(in_array($_POST['username'], $CREDENTIALS[$user], false)){
                                        $_SESSION['ACCESS'] = getAccess($userDetails);
                                        $_SESSION['FULLNAME'] = getFullname($userDetails);
                                        loginUser($CREDENTIALS, $providedUsername, $providedPassword);
                                    } else  {
                                        // login dne
                                    } 
                                }
                            }
                        } 
                    } else {
                        removeItem();
                    }
                } else {
                    $newItem = $_POST[$_SESSION['FUNCTIONS']["F1"]];
                    if (array_key_exists($_SESSION['FUNCTIONS']["F1"], $_POST)){
                        addItem($newItem);
                    }
                }
            } else {
                printItems();
            }

            function addItem($addValue){
                array_push($_SESSION['CURRENT_ORDER'], $addValue);
                calculateTotal();
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

            function clearOrder(){
                if(isset($_SESSION['CURRENT_ORDER'])){
                    unset($_SESSION['CURRENT_ORDER']);
                }
                if(isset($_SESSION['TOTAL_PRICE'])){
                    unset($_SESSION['TOTAL_PRICE']);
                }
            }

            function getName($item){
                $itemName = $item['longname'];
                return($itemName);
            }
            function getPrice($item){
                $itemPrice = $item['price'];
                return($itemPrice);
            }
            function getImage($item){
                $itemImage = $item['image'];
                return($itemImage);
            }

            function loginUser($CREDENTIALS, $providedUser, $providedPass){
                foreach ($CREDENTIALS as $user => $userDetails){
                    $USERNAME = getUsername($userDetails);
                    $PASSWORD = getPassword($userDetails);

                    verifyDetails($USERNAME, $PASSWORD, $providedUser, $providedPass, "LOGIN");
                }
            }

            function logoutUser(){
            
                $_SESSION["ACCESS"] = "";
                $_SESSION["FULLNAME"] = "";
                verifyDetails(null, null, null, null, "LOGOUT");
            }

            function verifyDetails($USER, $PASS, $user, $pass, $intent){
                $ACCESS = $_SESSION["ACCESS"];
                if(strcmp($intent, "LOGIN")){
                    if(strcmp($USER, $user) == 0){
                        if (strcmp($PASS, $pass) == 0){
                            checkAccess($ACCESS);
                            printItems();
                        } else {
                            //go back to login, show invalid password
                        }
                    } else {
                        //go back to login, show invalid username
                    }
                } else {
                    printItems();
                }
            }

            function getUsername($user){
                $username = $user['username'];
                return($username);
            }
            function getPassword($user){
                $password = $user['password'];
                return($password);
            }
            function getAccess($user){
                $access = $user['access'];
                return($access);
            }
            function getFullname($user){
                $fullname = $user['name_full'];
                return($fullname);
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
                                    <input type=\""."submit\""." class=\""."nav-link\""." name=\""."finish_order\""." value=\""."Cart\""."/>
                                </li>
                            </form>
                            <form
                                method=\""."post\""."
                                action=\""."homePage.php\""."
                            >
                                <li class=\""."nav-item\"".">
                                    <input type=\""."submit\""." class=\""."nav-link\""." aria-current=\""."page\""." name=\""."logout_user\""." value=\""."Sign out\""."/>
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
                                    <input type=\""."submit\""." class=\""."nav-link\""." name=\""."finish_order\""." value=\""."Cart\""."/>
                                </li>
                            </form>
                            <form
                                method=\""."post\""."
                                action=\""."homePage.php\""."
                            >
                                <li class=\""."nav-item\"".">
                                    <input type=\""."submit\""." class=\""."nav-link\""." aria-current=\""."page\""." name=\""."logout_user\""." value=\""."Sign out\""."/>
                                </li>
                            </form>
                        ");
                        echo ("
                            <li class=\""."nav-item\"".">
                                <a class=\""." nav-link disabled active\""." aria-current=\""."page\""."> Welcome, ". $_SESSION['FULLNAME'] ."</a>
                            </li>
                        ");
                    } else {
                        echo ("
                            <form
                                method=\""."post\""."
                                action=\""."orderReciept.php\""."
                            >
                                <li class=\""."nav-item\"".">
                                    <input type=\""."submit\""." class=\""."nav-link\""." name=\""."finish_order\""." value=\""."Cart\""."/>
                                </li>
                            </form>
                            <a class=\""."nav-link\""." aria-current=\""."page\""." href=\""."loginPage.php\"".">Sign in</a>
                        ");
                    }
                }
            }
        ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>