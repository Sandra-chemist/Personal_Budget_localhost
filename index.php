  <?php

    session_start();

    if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true)){
        header('Location: main_menu.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Sign in</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css" type="text/css">
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
            <p>
            <a href="registration.php"><h3><input type="button" value="Darmowa rejestracja!"></h3></a>
            </p>
</div>
            <header>
                <h2 class="logo">Zaloguj się</h2>
            </header>
            <div class="row">
                <form action="signIn.php" method="post">
                    <p>
                        <i class="icon-mail"></i>
                    <input type="email" placeholder="E-mail" name="email">
                    </p>
                    <p>
                        <i class="icon-lock"></i>
                        <input type="password" placeholder="Hasło" id="password" name="password">
                        <i id="hider" onclick="showhide()"></i>
                    </p>
                    <p class="remember">
                        <input type="checkbox" id="Remember" name="Remember">
                        <label for="Remember">Zapamiętaj mnie</label>
                    </p>
                    <input type="submit" value="Zaloguj się">
                    <h5>Zapomniałeś hasła?</h5>
                </form>
                <p id="mistake">
                <?php
                if(isset($_SESSION['error'])) echo $_SESSION['error'];
?>
</p>
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
    <script src="personalBudget.js"></script>
</body>

</html>