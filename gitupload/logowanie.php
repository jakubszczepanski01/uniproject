<?php
    
    require_once "connect.php";
    $polaczenie = @new mysqli ($host, $db_user, $db_password, $db_name);
    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;

        
    }
    else
    {

        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM clientdata WHERE login = '$login'";

        if($rezultat = $polaczenie->query($sql))
            {
                $ilu_userow = $rezultat->num_rows;
                if($ilu_userow>0)
                    {
                        $wiersz = $rezultat->fetch_assoc();

                        if(password_verify($haslo,$wiersz['password']))
                        {
                            $user = $wiersz['login'];
                            $rezultat->free_result();

                            header('Location: poprawnelogowanie.php');
                            
                        }
                        else
                        {
                            $dane_poprawne = false;
                            $_SESSION['b_haslo'] = '<p class = "errortext"> Błędne dane logowania! </p>';
                            

                        }
                    }
            }
    }
    $polaczenie->close();
            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logowanie</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">

</head>

<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form action="logowanie.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Zaloguj się</h1>

    <div class="form-floating">
        <input type="login" class="form-control" name="login" id="floatingInput" placeholder="Login">
        <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="haslo" id="floatingPassword" placeholder="Hasło">
        <label for="floatingPassword">Hasło</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Zaloguj się</button>
    <?php
                if(isset($_SESSION['b_haslo']))
                {
                    echo $_SESSION['b_haslo'];
                    unset ($_SESSION['b_haslo']);


                }

            ?>
    <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj się już teraz!</a></p>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
</main>


    
  

</body>
</html>