<?php 
    session_start(); 
    // session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Multi : Login</title>
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
                        <a class="nav-link" aria-current="page" href="homePage.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Give us a review!</a>
                    </li> -->
                    <form
                        method="post"
                        action="orderReciept.php"
                    >
                        <li class="nav-item">
                            <a class="nav-link disabled">Cart</a>
                        </li>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link active disabled">Sign In</a>
                    </li>
                </ul>
                </div>
            </div>
            </nav>
        </div>
    </div>

    <?php
        $CREDENTIALS = $_SESSION['CREDENTIALS'];

        function printLogin(){
            ?>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="row card">
                        <div class="col-12 mt-4"><h2>Member Sign In</h2></div>
                        <div class="col-12">
                            <section class="items">
                                <form
                                    method="post"
                                    action="loginPage.php"
                                >
                                    <p>
                                        Username: 
                                        <input
                                            type="text"
                                            name="username"
                                        />
                                    </p>
                                    <p>
                                        Password: 
                                        <input
                                            type="text"
                                            name="password"
                                        />
                                    </p>
                                    <p>
                                        <input 
                                            type="submit"
                                            name="login_user"
                                            class="btn btn-warning"
                                            value="Login"
                                            style="color: white;"
                                        />
                                    </p>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <?php
        }

        function printError(){
            ?>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="row card">
                        <div class="col-12 mt-4"><h2>Member Sign In</h2></div>
                        <div class="col-12 mt-2"><h3 style="color: red;">Invalid Credentials</h3></div>
                        <div class="col-12">
                            <section class="items">
                                <form
                                    method="post"
                                    action="loginPage.php"
                                >
                                    <p>
                                        Username: 
                                        <input
                                            type="text"
                                            name="username"
                                        />
                                    </p>
                                    <p>
                                        Password: 
                                        <input
                                            type="text"
                                            name="password"
                                        />
                                    </p>
                                    <p>
                                        <input 
                                            type="submit"
                                            name="login_user"
                                            class="btn btn-warning"
                                            value="Login"
                                            style="color: white;"
                                        />
                                    </p>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <?php
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST[$_SESSION['FUNCTIONS']["F4"]])){ //login user
                printLogin();
            } else {
                $providedUsername = $_POST['username'];
                $providedPassword = $_POST['password'];
                
                $error = checkUser($CREDENTIALS, $providedUsername);

                if(!$error){
                    $USERNAME = 
                    $error = loginUser($providedUsername, $providedPassword);
                    if(!$error){
                        ?> <meta http-equiv="refresh" content="0;url=http://localhost/ITDOM2/Finals/pages/homePage.php"> <?php
                    } else {
                        printError();
                    }
                } else {
                    printError();
                }
            }
        } else if(!isset($_SESSION["ACCESS"])){
            printLogin();
        } 

        function checkUser($CREDENTIALS, $user){
            foreach ($CREDENTIALS as $user => $userDetails){
                if(in_array($_POST['username'], $CREDENTIALS[$user], false)){
                    $_SESSION["USER_DETAILS"] = $userDetails;
                    return(False);
                } 
            }
            return(True);
        }
        
        function loginUser($providedUser, $providedPass){
            $USERNAME = $_SESSION["USER_DETAILS"]["username"];
            $PASSWORD = $_SESSION["USER_DETAILS"]["password"];

            if(strcmp($USERNAME, $providedUser) == 0){
                if (strcmp($PASSWORD, $providedPass) == 0){
                    $ACCESS = $_SESSION["USER_DETAILS"]["access"];
                    $FULLNAME = $_SESSION["USER_DETAILS"]["name_full"];
                    $_SESSION['ACCESS'] = $ACCESS;
                    $_SESSION['FULLNAME'] = $FULLNAME;
                    return(False);
                } else {
                    return(True);
                }
            } else {
                return(True);
            }  
            return(True);
        }

        function getUsername($user){
            $username = $user['username'];
            return($username);
        }
        function getPassword($user){
            $password = $user['password'];
            return($password);
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>


<!-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="Midterm.php">
            <img src="../assets/logo.png" class="navbar-logo" text-align="center">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <form
                    method="post"
                    action="orderReciept.php"
                >
                    <li class="nav-item">
                        <input type="submit" class="nav-link" name="finish_order" value="Cart"/>
                    </li>
                </form>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Take a break and have a McDonald's merienda! I'm lovin' it!</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->