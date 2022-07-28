<?php

    session_start();

    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Main Menu</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="menu.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1 class="logo">Personal Budget</h1>
        <h4> Your Finance Manager </h4>
    </header>
    <main>
        <article class="container-fluid">
            <header>
            <div class="row">
                <p id="user">
            <?php
             echo "Hello ".$_SESSION['username']."!";
            ?>
            </p>
            </div>
                <h2 class="logo">Main menu</h2>
            </header>
            <div class="row">
                <form>
                    <p>
                        <i class="icon-money"></i>
                        <input type="submit" value="Add Income">
                    </p>
                    <p>
                        <i class="icon-basket"></i>
                        <input type="submit" value="Add Expense">
                    </p>
                    <p>
                        <i class="icon-chart-pie"></i>
                        <input type="submit" value="View Balance">
                    </p>
                    <p>
                        <i class="icon-cog"></i>
                        <input type="submit" value="Settings">
                    </p>
                    <p>
                        <i class="icon-logout"></i> 
                        <a href="logout.php"><input type="button" value="Sign out"></a>
                    </p>
                </form>
            </div>
        </article>
    </main>
    <footer>
        <i class="icon-copyright"></i>
        Sandra Skibiszewska
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>