<?php 
    session_start();
    
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Multi : New Item</title>
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
                                if(isset($_SESSION["ACCESS"])){
                                    checkAccess();
                                } else {
                                    echo ("
                                        <li class=\""."nav-item\"".">
                                            <a class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." href=\""."loginPage.php\""." style=\""."color: gray; margin-right: 5px;\"".">Cart</a>
                                        </li>
                                        <li class=\""."nav-item\"".">
                                            <a class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." href=\""."loginPage.php\""." style=\""."color: white; margin-right: 5px;\"".">Sign in</a>
                                        </li>
                                    ");
                                }
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
        action="../upload.php" 
        enctype="multipart/form-data"
    >
        <div class="row">
            <div class="col-12">
                <div class="row item_order">
                    <div class="col-4 card-item">
                        <div class="card-body">
                                <p class="card-text mt-2">
                                    Item Key: 
                                    <input
                                        type="text"
                                        name="key"
                                    />
                                </p>
                                <p class="card-text">
                                    Item Image: 
                                    <input 
                                        type="file" 
                                        name="fileToUpload" 
                                        id="fileToUpload"
                                    />
                                </p>
                                <p class="card-text">
                                    Item Name: 
                                    <input
                                        type="text"
                                        name="name"
                                    />
                                </p>
                                <p class="card-text">
                                    Item Price: 
                                    <input
                                        type="number"
                                        name="price"
                                    />
                                </p>
                            <input 
                                type="submit"
                                name="submit"
                                class="btn btn-warning"
                                value="Create New Item"
                                style="color: white;"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php     
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
                                <input type=\""."submit\""." class=\""."nav-link btn btn-outline-light\""." name=\""."finish_order\""." value=\""."Cart\""." style=\""."color: white; margin-right: 5px;\""."/>
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
                        <li class=\""."nav-item\"".">
                            <a class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." href=\""."createItem.php\""." style=\""."color: white; margin-right: 5px;\"".">New Item</a>
                        </li>
                    ");
                    echo ("
                        <li class=\""."nav-item\"".">
                            <a class=\""." nav-link disabled active\""." aria-current=\""."page\""." style=\""."color: white; margin-right: 5px;\""."> Welcome, ". $_SESSION['FULLNAME'] ."</a>
                        </li>
                    ");
                } else if($userAccess == "MEMBER"){
                    echo ("
                        <form
                            method=\""."post\""."
                            action=\""."orderReciept.php\""."
                        >
                            <li class=\""."nav-item\"".">
                                <input type=\""."submit\""." class=\""."nav-link btn btn-outline-light\""." name=\""."finish_order\""." value=\""."Cart\""." style=\""."color: white; margin-right: 5px;\""."/>
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
                                <input type=\""."submit\""." class=\""."nav-link disabled  btn btn-outline-light\""." name=\""."finish_order\""." value=\""."Cart\""." style=\""." color: gray; margin-right: 5px;\""."/>
                            </li>
                        </form>
                        <a class=\""."nav-link btn btn-outline-light\""." aria-current=\""."page\""." href=\""."loginPage.php\""." style=\""." color: white; margin-right: 5px;\"".">Sign in</a>
                    ");
                }
        }

        function reloadPage(){
            echo("<meta http-equiv='refresh' content='1'>");
        }
    ?>
</body>
</html>