<?php

    session_start();

    if (!isset($_SESSION['successfulRegistration'])){
        header('Location: index.php');
        exit();
    }
    else{
        unset($_SESSION['successfulRegistration']);
    }

    //Usuwanie zmiennych pamietajacych wartosci wpisane do formularza
    if (isset($_SESSION['fr_username'])) unset($_SESSION['fr_username']);
    if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if (isset($_SESSION['fr_password'])) unset($_SESSION['fr_password']);
    if (isset($_SESSION['fr_conditions'])) unset($_SESSION['fr_conditions']);

    //Usuwanie bledow rejestracji
    if (isset($_SESSION['e_username'])) unset($_SESSION['e_username']);
    if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if (isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
    if (isset($_SESSION['e_conditions'])) unset($_SESSION['e_conditions']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="welcome.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <h1 class="logo">Budżet Osobisty</h1>
        <h4> Twój Menedżer Finansów </h4>
    </header>
    <main>
        <article class="container-fluid">
        <div class="row">
                <form>
                    <p>
                        <h2>Dziękuję za Twoją rejestrację! </h2></br>
                    </p>
                    <p>
                         <h3>Możesz teraz zalogować się na swoje konto. </h3>
                    </p>
                    <p>
                        <a href="index.php"><h5><input type="button" value="Zaloguj się na swoje konto!"></h5></a>
                    </p>
                </form>
            </div>
    </main>
    <footer>
        <i class="icon-copyright"></i>
        Sandra Skibiszewska
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="personalBudget.js"></script>
</body>

</html>