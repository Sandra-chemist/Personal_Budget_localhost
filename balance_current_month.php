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

    $result_1 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 1"); 
    $result_2 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 2"); 
    $result_3 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 3"); 
    $result_4 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 4");
    
    $result_1e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 1"); 
    $result_2e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 2"); 
    $result_3e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 3"); 
    $result_4e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 4");
    $result_5e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 5"); 
    $result_6e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 6"); 
    $result_7e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 7"); 
    $result_8e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 8");
    $result_9e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 9"); 
    $result_10e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 10"); 
    $result_11e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 11"); 
    $result_12e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 12");
    $result_13e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 13"); 
    $result_14e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 14"); 
    $result_15e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 15"); 
    $result_16e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 16");

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Budget - View Balance</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="show_balance.css" type="text/css">
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
            <h2 class="logo">Obecny miesiąc</h2>
            <div class="row">
                <p>
                <a href="main_menu.php"><input type="button" id="menu" value="Menu główne"></a>  
    </p>
            </div>
            <div class="row">
                <section class="col-xl-6 col-xxl-4 offset-xxl-2">
                    <table>
                        <thead>
                            <tr >
                                <header>
                               <h3 id="incomes"> Przychody </h3>
                                </header>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cat">Pensja</td>  
                                <td>
                                <?php
                        if($result_1->num_rows > 0){
                            while($row = $result_1->fetch_assoc()){
                              echo $row['date_of_income']." ";  
                              echo $row['amount']." ";
                              echo $row['income_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                                <td class="cat">Odsetki bankowe</td>
                                <td>
                                <?php
                        if($result_2->num_rows > 0){
                            while($row = $result_2->fetch_assoc()){
                               echo $row['date_of_income']." "; 
                               echo $row['amount']." ";
                               echo $row['income_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="cat">Sprzedaż na allegro</td>
                                <td>
                                <?php
                            if($result_3->num_rows > 0){
                            while($row = $result_3->fetch_assoc()){
                               echo $row['date_of_income']." "; 
                               echo $row['amount']." ";
                               echo $row['income_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }

                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="cat">inne</td>
                                <td>
                                <?php
                        if($result_4->num_rows > 0){
                            while($row = $result_4->fetch_assoc()){
                                echo $row['date_of_income']." ";
                                echo $row['amount']." ";
                                echo $row['income_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                                </td>
                            </tr>
                            <tr class="total">
                                <th>total</th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="piechart1"></div>
                </section>
                <section class="col-xl-6 col-xxl-4">
                    <table>
                        <thead>
                            <tr>
                            <header>
                        <h3 id="expenses">Wydatki</h3>
                    </header>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td class="cat">Jedzenie</td>  
                                <td>
                                <?php
                        if($result_1e->num_rows > 0){
                            while($row = $result_1e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            <tr>
                            <td class="cat">Mieszkanie</td>  
                                <td>
                                <?php
                        if($result_2e->num_rows > 0){
                            while($row = $result_2e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <td class="cat">Transport</td>  
                                <td>
                                <?php
                        if($result_3e->num_rows > 0){
                            while($row = $result_3e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            <tr>
                            <td class="cat">Telekomunikacja</td>  
                                <td>
                                <?php
                        if($result_4e->num_rows > 0){
                            while($row = $result_4e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Opieka zdrowotna</td>  
                                <td>
                                <?php
                        if($result_5e->num_rows > 0){
                            while($row = $result_5e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <td class="cat">Ubrania</td>  
                                <td>
                                <?php
                        if($result_6e->num_rows > 0){
                            while($row = $result_6e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            <tr>
                            <td class="cat">Higiena</td>  
                                <td>
                                <?php
                        if($result_7e->num_rows > 0){
                            while($row = $result_7e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Dzieci</td>  
                                <td>
                                <?php
                        if($result_8e->num_rows > 0){
                            while($row = $result_8e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Rozrywka</td>  
                                <td>
                                <?php
                        if($result_9e->num_rows > 0){
                            while($row = $result_9e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Podróże</td>  
                                <td>
                                <?php
                        if($result_10e->num_rows > 0){
                            while($row = $result_10e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Szkolenia/Kursy</td>  
                                <td>
                                <?php
                        if($result_11e->num_rows > 0){
                            while($row = $result_11e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Książki</td>  
                                <td>
                                <?php
                        if($result_12e->num_rows > 0){
                            while($row = $result_12e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Oszczędności</td>  
                                <td>
                                <?php
                        if($result_13e->num_rows > 0){
                            while($row = $result_13e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Spłata długów</td>  
                                <td>
                                <?php
                        if($result_14e->num_rows > 0){
                            while($row = $result_14e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Darowizna</td>  
                                <td>
                                <?php
                        if($result_15e->num_rows > 0){
                            while($row = $result_15e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Giełda</td>  
                                <td>
                                <?php
                        if($result_16e->num_rows > 0){
                            while($row = $result_16e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                              echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr class="total">
                                <th>total</th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="piechart2"></div>
                </section>
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