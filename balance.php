<?php

    session_start();

    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit();
    }
    $email = $_SESSION['email'];

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    $user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - View Balance</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="balance.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1 class="logo">Budżet Osobisty</h1>
        <h4> Twój Menedżer Finansów </h4>
    </header>
    <main>
        <article class="container-fluid">
            <header>
                <h2 class="logo">Przeglądaj bilans</h2>
            </header>
            <div class="row">
                <form>
                <p>
                <div class="dropdown">
                    <button class="dropbtn">Wybierz okres czasu</button>
                    <div class="dropdown-content">
                        <a href="balance_current_month.php">obecny miesiąc</a>
                        <a href="balance_previous_month.php">poprzedni miesiąc</a>
                        <a href="balance_current_year.php">obecny rok</a>
                        <a href="balance_selected_period.php">wybrany okres czasu</a>
                    </div>
                    </div>
                </p>
                    <a href="main_menu.php"><input type="button" value="Menu główne"></a>  
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