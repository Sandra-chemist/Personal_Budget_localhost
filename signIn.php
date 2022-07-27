<?php
    session_start();

    if((!isset($_POST['email'])) || (!isset($_POST['password']))){
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name); 
    if($connection->connect_errno!=0){
        echo "Error: ".$connection->connect_errno;
    }
    else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = htmlentities($email,ENT_QUOTES, "UTF-8");
        $password = htmlentities($password,ENT_QUOTES, "UTF-8");

       
       if ($result = @$connection->query(sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", 
       mysqli_real_escape_string($connection,$email),mysqli_real_escape_string($connection,$password)))){
        $users_amount = $result->num_rows;
        if($users_amount>0)
        {
            $_SESSION['logged'] = true;
           
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $email = $row['email'];
            $_SESSION['username'] = $row['username'];

            unset($_SESSION['error']);
            $result->close();
            header('Location: main_menu.php');
        }
        else{
            $_SESSION['error'] = '<span>
            Incorrect login or password!</span>';
            header('Location: index.php');
        }
       }

       $connection->close();
    }

?>