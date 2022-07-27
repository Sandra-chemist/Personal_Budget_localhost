<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <h1 class="logo">Personal Budget</h1>
        <h4> Your Finance Manager </h4>
    </header>
    <main>
        <article class="container-fluid">
            <header>
                <h2 class="logo">Registration</h2>
                <h3>Create a new account!</h3>
            </header>
            <div class="row">
                <form>
                    <p>
                        <i class="icon-user-2"></i>
                        <input type="text" placeholder="Username">
                    </p>
                    <p>
                        <i class="icon-mail"></i>
                        <input type="email" placeholder="E-mail">
                    </p>
                    <p>
                        <i class="icon-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password">
                        <i id="hider" onclick="showhide()"></i>
                    </p>
                    <input type="submit" value="Register">
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
    <script src="personalBudget.js"></script>
</body>

</html>