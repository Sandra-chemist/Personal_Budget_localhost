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
        <h1 class="logo">Personal Budget</h1>
        <h4> Your Finance Manager </h4>
    </header>
    <main>
        <article class="container-fluid">
            <header>
                <h2 class="logo">Add Expense</h2>
            </header>
            <div class="row">
                <form method = "post">
                    <p>
                        <label class="amount">Amount <input type="number" name="amount" placeholder="123" step="0.01" min="0"></label>
                    </p>
                    <p>
                        <label class="date" for="start">Date </label>
                        <input type="date" id="start" name="date">
                    </p>
                    <p>
                        <label class="payment">Payment Method </label>

                        <input type="radio" id="cash" name="payments" value="cash" checked><label for="cash">
                            cash</label>

                        <input type="radio" id="debid_card" name="payments" value="debid_card"><label for="debid_card">
                            debid card</label>

                        <input type="radio" id="credit_card" name="payments" value="credit_card"><label
                            for="credit_card"> credit card</label>
                    </p>
                    <p>
                        <label class="category">Category </label>
                        <select id="expense" name="category">
                            <option>food</option>
                            <option>flat</option>
                            <option>transport</option>
                            <option>telecommunication</option>
                            <option>healthcare</option>
                            <option>clothes</option>
                            <option>hygiene</option>
                            <option>kids</option>
                            <option>entertainment</option>
                            <option>trip</option>
                            <option>training</option>
                            <option>books</option>
                            <option>savings</option>
                            <option>debt repayment </option>
                            <option>donation</option>
                            <option>stock exchange</option>
                        </select>
                    </p>
                    <p>
                        <label class="comment">Comment <input type="text" name="comment" placeholder="(optional)"></label>
                        <?php
                            if (isset($_SESSION['e_expense_comment'])){
                                echo '<div class="error">'.$_SESSION['e_expense_comment'].'</div>';
                                unset($_SESSION['e_expense_comment']);
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