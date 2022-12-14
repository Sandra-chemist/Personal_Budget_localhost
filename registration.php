<?php
    session_start();    

    if (isset($_POST['email'])){
        //udana walidacja?
        $all_ok = true;

        //sprawdz poprawnoc haslo
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $username = $_POST['username'];
        $email = $_POST['email'];

        if ((strlen($password) < 8) || (strlen($password) > 20)){
            $all_ok = false;
            $_SESSION['e_password'] = "Hasło musi posiadać od 8 do 20 znaków";
        }
 
        if ($password != $password2){
            $all_ok = false;
            $_SESSION['e_password'] = "Podane hasła nie są identyczne";
        }
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        //Czy zaakceptowano regulamin?
        if (!isset($_POST['conditions'])){
            $all_ok = false;
            $_SESSION['e_conditions'] = "Zaakceptuj regulamin";
        }

        //Bot or not?
        $secret = "6LdSiXIhAAAAADwqi-oA1rEJ2bT7-mZUmVWMU5Y8";

        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($check);

        if ($answer->success == false){
            $all_ok = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś robotem!";
        }

        //Zapamietaj wprowadzone dane
        $_SESSION['fr_username'] = $username;
        $_SESSION['fr_password'] = $password;
        $_SESSION['fr_email'] = $email;

        if(isset($_POST['conditions'])) $_SESSION['fr_conditions'] = true;


        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name); 
            if($connection->connect_errno!=0){
               throw new Exception(mysqli_connect_errno());
            }
            else{
                //czy email juz istnieje?
                $email = $_POST['email'];
                $result = $connection->query("SELECT id FROM users WHERE email='$email'");
				if (!$result) throw new Exception($connection->error);
				
				$how_many_email = $result->num_rows;
                if($how_many_email>0)
				{
					$all_ok=false;
					$_SESSION['e_email']="Z tym adresem e-mail już istnieje konto";
				}	
                if ($all_ok == true){
                    //Wszystkie testy zaliczone, dodajemy do bazy
                    if ($connection->query("INSERT INTO users VALUES (NULL, '$username','$password_hash', '$email')")){ 
                        $connection->query("INSERT INTO incomes_category_assigned_to_users (id, user_id, name) SELECT incomes_category_default.id, users.id, incomes_category_default.name FROM incomes_category_default, users WHERE email='$email'");
                        $connection->query("INSERT INTO expenses_category_assigned_to_users (id, user_id, name) SELECT expenses_category_default.id, users.id, expenses_category_default.name FROM expenses_category_default, users WHERE email='$email'");
                        $connection->query("INSERT INTO payment_methods_assigned_to_users (id, user_id, name) SELECT payment_methods_default.id, users.id, payment_methods_default.name FROM payment_methods_default, users WHERE email='$email'");
                        $_SESSION['successfulRegistration'] = true; 
                        header('Location: welcome.php');
                    }
                  
                    else{
                        throw new Exception($connection->error);
                    }
                }
                $connection->close();
            }
        }
        catch(Exception $e){
            echo 'Server error! We apologize for the inconvenience and please register at a later date.';
            //echo '<br />Informacja developerska: '.$e;
        }   
    }
?>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <header>
        <h1 class="logo">Budżet Osobisty</h1>
        <h4> Twój Menedżer Finansów</h4>
    </header>
    <main>
        <article class="container-fluid">
            <header>
                <h2 class="logo">Rejestracja</h2>
                <h3>Utwórz nowe konto!</h3>
            </header>
            <div class="row">
                <form method="post">
                    <p>
                        <i class="icon-user-2"></i>
                        <input type="text" placeholder="Imię"  value = "<?php
                        if (isset($_SESSION['fr_username'])){
                            echo $_SESSION['fr_username'];
                            unset($_SESSION['fr_username']);
                        }
                        ?>" name="username">
                    </p>
                    <p>
                        <i class="icon-mail"></i>
                        <input type="email" placeholder="E-mail" value = "<?php
                        if (isset($_SESSION['fr_email'])){
                            echo $_SESSION['fr_email'];
                            unset($_SESSION['fr_email']);
                        }
                        ?>" name="email">
                        <?php
                            if (isset($_SESSION['e_email'])){
                                echo '<div class = "error">'.$_SESSION['e_email'].'</div>';
                                unset($_SESSION['e_email']);
                            }
                        ?>
                    </p>
                    <p>
                        <i class="icon-lock"></i>
                        <input type="password" value = "<?php
                        if (isset($_SESSION['fr_password'])){
                            echo $_SESSION['fr_password'];
                            unset($_SESSION['fr_password']);
                        }
                        ?>" name="password" id="password" placeholder="Hasło">
                        <?php
                            if (isset($_SESSION['e_password'])){
                                echo '<div class = "error">'.$_SESSION['e_password'].'</div>';
                                unset($_SESSION['e_password']);
                            }
                        ?>
                    </p>
                    <p>
                    <i class="icon-lock"></i>
                        <input type="password" name="password2" id="password2" placeholder="Powtórz hasło">
                        </p>
                    <p>
                        <label>
                            <input type="checkbox" name="conditions" <?php
                            if (isset($_SESSION['fr_conditions']))
                            {
                                echo "checked";
                                unset($_SESSION['fr_conditions']);
                            }
                                ?>/> Akceptuję regulamin
                        </label>
                     <?php
                            if (isset($_SESSION['e_conditions'])){
                                echo '<div class = "error">'.$_SESSION['e_conditions'].'</div>';
                                unset($_SESSION['e_conditions']);
                            }
                        ?>
                    </p>     
                    <div class="g-recaptcha" data-sitekey="6LdSiXIhAAAAAJ82JINrTdobcOPdW9zqWKxYewVb"></div>   
                    <?php
                            if (isset($_SESSION['e_bot'])){
                                echo '<div class = "error1">'.$_SESSION['e_bot'].'</div>';
                                unset($_SESSION['e_bot']);
                            }
                        ?>
                    <input type="submit" value="Zarejestruj się!">
                    <a href="index.php"><input type="button" value="Anuluj"></a>  
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