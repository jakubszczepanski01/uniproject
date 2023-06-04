<?php
session_start();
if(isset($_POST['email']))
    {
        $danem = false;
        $email = trim($_POST['email']);
        $sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
        if(preg_match($sprawdz, $email))
        {
            $dane_poprawne = true;
        }   
        else
        {
            $dane_poprawne = false;
            $_SESSION['b_email'] = '<p class = "errortext"> Adres email nieprawidłowy</p>';
        
        
        }
            



        

    }
if(isset($_POST['login']))
    {
        $login = trim($_POST['login']);
        if(strlen($login) > 0)
            {
                if(ctype_alnum($login))
                {
                    $dane_poprawne = true;
                    
                }
                    
                
            }

        else
            {
                $dane_poprawne = false;
                $_SESSION['b_login'] = '<p class = "errortext"> Login zawiera niedozwolone znaki </p>';


            }



    }
if(isset($_POST['haslo']))
    {
        $haslo = $_POST['haslo'];
        if(strlen($haslo) > 8)
            {
                $dane_poprawne = true;
                $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

            }
        else
            {
                $dane_poprawne = false;
                $_SESSION['b_haslo'] = '<p class = "errortext"> Hasło musi mieć więcej niż 8 znaków </p>';


            }



    }
if(isset($_POST['haslo1']) && $dane_poprawne = true)
    {
        $haslo1 = $_POST['haslo1'];
        if(strcmp($haslo,$haslo1) == 0)
            {
                $dane_poprawne = true;
                
            
            }
        else
            {
                $dane_poprawne = false;

                $_SESSION['b_haslo1'] = '<p class = "errortext"> Hasła nie są jednakowe </p>';
            
            
            }
            
            
            
    }
if(isset($_POST['regulamin']))
    {
        $regulamin = $_POST['regulamin'];
        $dane_poprawne = true;
    }
    else
    {
        $dane_poprawne = false;

        $_SESSION['b_regulamin'] = '<p class= "errortext"> Regulamin niezaakceptowany</p>';


    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rejestracja</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">

</head>




<body class="text-center">
    
<main class="form-signin w-100 m-auto">
<form method="post">
    
    <h1 class="h3 mb-3 fw-normal">Formularz rejestracji</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="margin-top: 25px; margin-bottom: 20px;">
      <label for="floatingInput">Adres email</label>
      <?php
                if(isset($_SESSION['b_email']))
                {
                    echo $_SESSION['b_email'];
                    unset ($_SESSION['b_email']);


                }

      ?>
      
    </div>
    <div class="form-floating">
      <input type="login" name="login" class="form-control" id="floatingPassword" placeholder="Login" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingPassword">Login</label>
      <?php
                if(isset($_SESSION['b_login']))
                {
                    echo $_SESSION['b_login'];
                    unset ($_SESSION['b_login']);


                }

      ?>
      
    </div>
    <div class="form-floating">
      <input type="password" name="haslo" class="form-control" id="floatingInput" placeholder="Hasło" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingInput">Hasło</label>
      <?php
                if(isset($_SESSION['b_haslo']))
                {
                    echo $_SESSION['b_haslo'];
                    unset ($_SESSION['b_haslo']);


                }

      ?>
      
    </div>
    <div class="form-floating">
      <input type="password" name="haslo1" class="form-control" id="floatingPassword" placeholder="Powtórz hasło" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingPassword">Powtórz hasło</label>
      <?php
                if(isset($_SESSION['b_haslo1']))
                {
                    echo $_SESSION['b_haslo1'];
                    unset ($_SESSION['b_haslo1']);


                }

      ?>
      
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name ="regulamin"> Zapoznałem się i akceptuję Regulamin świadczenia usług i politykę prywatności.
        <?php
                if(isset($_SESSION['b_regulamin']))
                {
                    echo $_SESSION['b_regulamin'];
                    unset ($_SESSION['b_regulamin']);


                }

        ?>
      </label>
      
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" value="Zarejestruj się">Zarejestruj się</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>

  <div class = "check">
        <?php
        if($dane_poprawne == true)
            {
                if(strlen($email) && isset($login) && isset($haslo) && isset($haslo1))
                {
                    
                    
                    
                    if(isset($email))    
                    {
                       require_once "connect.php";
                       mysqli_report(MYSQLI_REPORT_STRICT);
                       try
                       {
                           $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                           if($polaczenie->connect_errno!=0)
                            {
                               throw new Exception(mysqli_connect_errno());
           
                            }
                           else
                            {
                               $rezultat = $polaczenie->query("SELECT client_id FROM clientdata WHERE email = '$email'");
           
                               if(!$rezultat) throw new Exception($polaczenie->error);
                               $ile_email = $rezultat->num_rows;
                               if(($ile_email>0))
                                { 
                                   $dane_poprawne = false;
                                   $_SESSION['b_email'] = '<p class = "errortext"> Istnieje już konto o takim adresie email';
                                }   
           
           
                            }  
                               
                               
                           
                       }
                       catch(Exception $e)
                       {
                           echo "Błąd serwera. Przepraszamy za niedogodności";
                           
                       }
           
                       require_once "connect.php";
                       mysqli_report(MYSQLI_REPORT_STRICT);
                       try
                       {
                           $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                           if($polaczenie->connect_errno!=0)
                           {
                               throw new Exception(mysqli_connect_errno());
           
                           }
                           else
                           {
                               $rezultat = $polaczenie->query("SELECT client_id FROM clientdata WHERE login='$login'");
           
                               if(!$rezultat) throw new Exception($polaczenie->error);
                               $ile_login = $rezultat->num_rows;
                               if($ile_login>0)
                               {
                                   $dane_poprawne = false;
                                   $_SESSION['b_login'] = '<p class = "errortext"> Istnieje już konto o takim loginie';
           
           
                               }
                               if($dane_poprawne == true)
                                   {
                                       if($polaczenie->query("INSERT INTO clientdata VALUES (NULL, '$email', '$login', '$haslo_hash')"))
                                       {
                                           $_SESSION['udanarejestracja'] = true;
                                           echo "<script>window.location.href='witamy.php'</script>";
                                            
                                       }
                                       else
                                       {
                                           throw new Exception ($polaczenie->error);
           
                                       }
           
           
           
                                   }       
                               $polaczenie->close();
                           }
                       }
                       catch(Exception $e)
                        {
                           echo "Błąd serwera. Przepraszamy za niedogodności";
                           
                        }                 
            }        }    }   
        ?>
                
               


            
        


    </div>  
</main>


    
  

</body>
</html>