<?php

    session_start();

    if(isset($_POST['amount']))
    {
        //Udana walidacja
        $everything_ok = true;

        $income_category_assigned_to_user_id = $_POST['category'];
        $amount = $_POST['amount'];
        $date_of_income = $_POST['date'];
      
        //Sprawdzenie dlugosci komentarza
        $income_comment = $_POST['comment'];
        if (strlen($income_comment) > 100){
            $everything_ok = false;
            $_SESSION['e_income_comment'] = "The maximum length of a comment is 100 characters!";
        }

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name); 
            if ($connection->connect_errno!=0){
                throw new Exception (mysqli_connect_errno());
            }
            
            if ($everything_ok == true){
                //Wszystkie testy zaliczone
                if ($connection->query("INSERT INTO incomes VALUES (NULL, 1, '$income_category_assigned_to_user_id', ' $amount', ' $amount', ' $income_comment' )")){
                    $_SESSION['addedincome'] = true;
                    header('Location: added_income.php');
                }
                else{
                    throw new Exception ($connection->error);
                }
            }
            $connection->close();
            }
        catch(Exception $e){
            echo 'Blad serwera!';
          //  echo '<br/>Informacja developerska: '.$e;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - Add Income</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="income.css" type="text/css">
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
                <h2 class="logo">Add Income</h2>
            </header>
            <div class="row">
                <form method = "post">
                <p>
                        <label class="categories">Category </label>
                        <select id="income" name ="category">
                            <option>salary</option>
                            <option>bank interest</option>
                            <option>sale on allegro</option>
                            <option>other</option>
                        </select>
                    </p>
                    <p>
                        <label class="amount">Amount </label> 
                        <input type="number" name="amount" placeholder="123" step="0.01" min="0">
                    </p>
                    <p>
                        <label class="date" for="start">Date </label> 
                        <input type="date" id="start" name="date">
                    </p>
                    <p>
                        <label class="comment">Comment </label>
                        <input type="text"  name="comment" placeholder="(optional)">
                        <?php
                            if (isset($_SESSION['e_income_comment'])){
                                echo '<div class="error">'.$_SESSION['e_income_comment'].'</div>';
                                unset($_SESSION['e_income_comment']);
                            }
                        ?>
                    </p>
                    <input id="add" type="submit" value="Add">
                    <a href="main_menu.php"><input type="button" value="Cancel"></a>  
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