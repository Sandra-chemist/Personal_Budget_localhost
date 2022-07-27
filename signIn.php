<?php

session_start();

if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
{
    header('Location: index.php');
    exit();
}

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
    
try 
{
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    
    if ($connection->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email = htmlentities($email, ENT_QUOTES, "UTF-8");
    
        if ($result = $connection->query(
        sprintf("SELECT * FROM users WHERE email='%s'",
        mysqli_real_escape_string($connection, $email))))
        {
            $ilu_userow = $result->num_rows;
            if($ilu_userow>0)
            {
                $row = $result->fetch_assoc();
                
                if (password_verify($password, $row['password']))
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    
                    unset($_SESSION['error']);
                    $result->free_result();
                    header('Location: main_menu.php');
                }
                else 
                {
                    $_SESSION['error'] = '<span>Nieprawidłowy login lub hasło!</span>';
                    header('Location: index.php');
                }
                
            } else {
                
                $_SESSION['error'] = '<span>Nieprawidłowy login lub hasło!</span>';
                header('Location: index.php');   
            }        
        }
        else
        {
            throw new Exception($connection->error);
        }
        
        $connection->close();
    }
}
catch(Exception $e)
{
    echo '<span>Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
    echo '<br />Informacja developerska: '.$e;
}
?>