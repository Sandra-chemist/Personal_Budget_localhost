<?php

    session_start();

    if(isset($_POST['amount']))
    {
        //Udana walidacja
        $everything_ok = true;

        $expense_category_assigned_to_user_id = $_POST['category'];
        $payment_method_assigned_to_user_id = $_POST['payments'];
        $amount = $_POST['amount'];
        $date_of_expense = $_POST['date'];
      
        //Sprawdzenie dlugosci komentarza
        $expense_comment = $_POST['comment'];
        if (strlen($expense_comment) > 100){
            $everything_ok = false;
            $_SESSION['e_expense_comment'] = "The maximum length of a comment is 100 characters!";
        }

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name); 
            if ($connection->connect_errno!=0){
                throw new Exception (mysqli_connect_errno());
            }
            
            if ($everything_ok == true){
                $user_id = $_SESSION['id'];
                $id = $_POST['category'];
                $expense_category_assigned_to_user_id = $id; 

                $id = $_POST['payments'];
                $payment_method_assigned_to_user_id = $id;
                //Wszystkie testy zaliczone
                if ($connection->query("INSERT INTO expenses VALUES (NULL, '$user_id', '$expense_category_assigned_to_user_id', '$payment_method_assigned_to_user_id', ' $amount', ' $date_of_expense', ' $expense_comment' )")){
                    $_SESSION['addedexpense'] = true;
                    header('Location: added_expense.php');
                }
                else{
                    throw new Exception ($connection->error);
                }
            }
            $connection->close();
            }
        catch(Exception $e){
            echo 'Server error!';
          //  echo '<br/>Informacja developerska: '.$e;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Add Expense</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="expense.css" type="text/css">
    <link rel="stylesheet" href="css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <h1 class="logo">Bud??et Osobisty</h1>
        <h4> Tw??j Mened??er Finans??w </h4>
    </header>
    <main>
    <article class="container-fluid">
            <header>
                <h2 class="logo">Dodaj Wydatek</h2>
            </header>
            <div class="row">
                <form method ="post">
                <p>
                        <label class="categories">Kategoria </label>
                        <select name ="category">
                        <option value="1">jedzenie</option>
                            <option value="2">mieszkanie</option>
                            <option value="3">transport</option>
                            <option value="4">telekomunikacja</option>
                            <option value="5">opieka zdrowotna</option>
                            <option value="6">ubrania</option>
                            <option value="7">higiena</option>
                            <option value="8">dzieci</option>
                            <option value="9">rozrywka</option>
                            <option value="10">podr????e</option>
                            <option value="11">szkolenia</option>
                            <option value="12">ksi????ki</option>
                            <option value="13">oszcz??dno??ci</option>
                            <option value="14">sp??ata d??ugu </option>
                            <option value="15">darowizna</option>
                            <option value="16">gie??da</option>
                        </select>
                    </p>
                    <p>
                        <label class="amount">Kwota </label> 
                        <input type="number" name="amount" placeholder="123" step="0.01" min="0" required>
                    </p>
                    <p>
                        <label class="payment">Metoda P??atno??ci </label>
                        <select id="payments" name="payments">
                            <option value="1">got??wka</option>
                            <option value="2">karta debetowa</option>
                            <option value="3">karta kredytowa</option>
                        </select>
                    </p>
                    <p>
                        <label class="date" for="start">Data </label> 
                        <input type="date" id="start" name="date" min="2000-01-01">
                    </p>
                    <p>
                        <label class="comment">Komentarz </label>
                        <input type="text"  name="comment" placeholder="(opcjonalnie)">
                        <?php
                            if (isset($_SESSION['e_expense_comment'])){
                                echo '<div class="error">'.$_SESSION['e_expense_comment'].'</div>';
                                unset($_SESSION['e_expense_comment']);
                            }
                        ?>
                    </p>
                    <input id="add" type="submit" name="submit" value="Dodaj">
                    <a href="main_menu.php"><input type="button" value="Anuluj"></a>  
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