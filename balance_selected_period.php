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
    
    $startDate = $_GET['startDate']; 
    $endDate = $_GET['endDate']; 

    $sql_income = $connection->query("SELECT `name`, SUM(`amount`) AS incomeSum FROM `incomes`, `incomes_category_assigned_to_users` WHERE `incomes`.`income_category_assigned_to_user_id` = `incomes_category_assigned_to_users`.`id` AND `incomes`.`user_id` = '$user_id' AND `incomes`.`date_of_income` BETWEEN '$startDate' AND '$endDate' GROUP BY `income_category_assigned_to_user_id` ORDER BY incomeSum DESC");
    $sql_expense = $connection->query("SELECT `name`, SUM(`amount`) AS expenseSum FROM `expenses`, `expenses_category_assigned_to_users` WHERE `expenses`.`expense_category_assigned_to_user_id` = `expenses_category_assigned_to_users`.`id` AND `expenses`.`user_id` = '$user_id' AND `expenses`.`date_of_expense` BETWEEN '$startDate' AND '$endDate' GROUP BY `expense_category_assigned_to_user_id` ORDER BY expenseSum DESC");
       
        if($startDate < $endDate){           
        $result_1 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 1 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
        $result_2 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 2 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
        $result_3 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 3 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
        $result_4 = $connection->query("SELECT * FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 4 && date_of_income BETWEEN '$startDate' AND '$endDate'");
        
        $result_1e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 1 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_2e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 2 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_3e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 3 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_4e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 4 && date_of_expense BETWEEN '$startDate' AND '$endDate'");
        $result_5e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 5 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_6e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 6 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_7e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 7 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_8e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 8 && date_of_expense BETWEEN '$startDate' AND '$endDate'");
        $result_9e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 9 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_10e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 10 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_11e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 11 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_12e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 12 && date_of_expense BETWEEN '$startDate' AND '$endDate'");
        $result_13e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 13 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_14e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 14 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_15e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 15 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
        $result_16e = $connection->query("SELECT * FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 16 && date_of_expense BETWEEN '$startDate' AND '$endDate'");
            }   
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
           
          ['Incomes', 'Amount'],
          <?php
                while ($chart = mysqli_fetch_assoc($sql_income)){
                    echo "['".$chart['name']."',".$chart['incomeSum']."],";
                }
        ?>
        ]);

        var options = {
          title: 'Przychody'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);

        var data1 = google.visualization.arrayToDataTable([
           
           ['Expenses', 'Amount'],
           <?php
                 while ($chart = mysqli_fetch_assoc($sql_expense)){
                     echo "['".$chart['name']."',".$chart['expenseSum']."],";
                 }
         ?>
         ]);
         var options1 = {
          title: 'Wydatki'
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data1, options1);
      }
    </script>
</head>

<body>
    <header>
        <h1 class="logo">Bud??et Osobisty</h1>
        <h4> Tw??j Mened??er Finans??w </h4>
    </header>
    <main>
        <article class="container-fluid">
            <h2 class="logo">Przegl??daj bilans</h2>
            <div class="row">
                <form>
                    <p>
                                <div class="form_group">
                                    <label class="start" for="start">Data pocz??tkowa</label>
                                    <input type="date" id="start" name="startDate"class="form_control" required>
                                </div>
                                <div class="form_group">
                                    <label class="end" for="start">Data ko??cowa</label>
                                    <input type="date"id="end" value="2022-09-01" name="endDate" class="form_control" required>
                                </div>
                                <h5><?php
                                if($startDate < $endDate){          
        echo "Wybrany okres czasu: ".$startDate. " - " .$endDate;
         }
        else{
         echo 'Wprowad?? dat?? ko??cow?? p????niejsz?? ni?? pocz??tkow??';
        }
       ?>                        
</h5>
                                <div class="form_group">
                                    <input type="submit" name="submit" value="Filtruj" class="form_control">
                                </div>
                                <div>
                                <a href="main_menu.php"><input type="button" id="menu" value="Menu g????wne"></a>
                                </div>
                            </div>
             </p>
            </form>
            </div>
            <div class="row">
                <section class="col-xl-6 col-xxl-4">
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
                            $res = $connection->query("SELECT incomes.id, SUM(incomes.amount) AS total FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 1 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                                echo "Suma: ".$rows['total'];
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
                            $res = $connection->query("SELECT incomes.id, SUM(incomes.amount) AS total FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 2 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                                echo "Suma: ".$rows['total'];
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="cat">Sprzeda?? na allegro</td>
                                <td>
                                <?php
                            if($result_3->num_rows > 0){
                            while($row = $result_3->fetch_assoc()){
                               echo $row['date_of_income']." "; 
                               echo $row['amount']." ";
                               echo $row['income_comment']."<br>";
                            }
                            $res = $connection->query("SELECT incomes.id, SUM(incomes.amount) AS total FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 3 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                            $res = $connection->query("SELECT incomes.id, SUM(incomes.amount) AS total FROM incomes WHERE user_id = '$user_id' && income_category_assigned_to_user_id = 4 && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                                echo "Suma: ".$rows['total'];
                            }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                                </td>
                            </tr>
                            <tr class="total">
                                <th>Suma</th>
                                <th>
                                <?php
                                   $res = $connection->query("SELECT incomes.id, SUM(incomes.amount) AS total FROM incomes WHERE user_id = '$user_id' && date_of_income BETWEEN '$startDate' AND '$endDate'"); 
                                   while($rows = mysqli_fetch_assoc($res)){
                                       echo $rows['total'];
                                   } 
                                ?>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <div id="piechart"></div>
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 1 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 2 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 3 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 4 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 5 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 6 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 7 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                            //  echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 8 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 9 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Podr????e</td>  
                                <td>
                                <?php
                        if($result_10e->num_rows > 0){
                            while($row = $result_10e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 10 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 11 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Ksi????ki</td>  
                                <td>
                                <?php
                        if($result_12e->num_rows > 0){
                            while($row = $result_12e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 12 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Oszcz??dno??ci</td>  
                                <td>
                                <?php
                        if($result_13e->num_rows > 0){
                            while($row = $result_13e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 13 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Sp??ata d??ug??w</td>  
                                <td>
                                <?php
                        if($result_14e->num_rows > 0){
                            while($row = $result_14e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                            //  echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 14 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
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
                            //  echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 15 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="cat">Gie??da</td>  
                                <td>
                                <?php
                        if($result_16e->num_rows > 0){
                            while($row = $result_16e->fetch_assoc()){
                              echo $row['date_of_expense']." ";  
                              echo $row['amount']." ";
                             // echo $row['payment_method_assigned_to_user_id']." ";
                              echo $row['expense_comment']."<br>";
                            }
                            $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && expense_category_assigned_to_user_id = 16 && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                            while($rows = mysqli_fetch_assoc($res)){
                            echo "Suma: ".$rows['total'];
                        }
                        }
                        else{
                            echo "Nie ma nic w bazie danych";
                        }
                        ?>
                            </td>
                            </tr>
                            <tr class="total">
                                <th>Suma</th>
                                <th> <?php
                                   $res = $connection->query("SELECT expenses.id, SUM(expenses.amount) AS total FROM expenses WHERE user_id = '$user_id' && date_of_expense BETWEEN '$startDate' AND '$endDate'"); 
                                   while($rows = mysqli_fetch_assoc($res)){
                                       echo $rows['total'];
                                   } 
                                ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <div id="piechart1"></div>
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
    <script src="personalBudget.js"></script>
</body>
</html>