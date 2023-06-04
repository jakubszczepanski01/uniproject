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
if(isset($_POST['imie']))
    {
        $imie = trim($_POST['imie']);
    }


if(isset($_POST['zgoda']))
    {
        $regulamin = $_POST['zgoda'];
        $dane_poprawne = true;
    }
    else
    {
        $dane_poprawne = false;

        $_SESSION['b_zgoda'] = '<p class= "errortext"> Zgoda na przetwarzanie danych niezaakceptowana</p>';


    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formularz kontaktowy</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">

</head>




<body class="text-center">
    
<main class="form-signin w-100 m-auto">
<form method="post" action="wysylkaformularz.php">
    
    <h1 class="h3 mb-3 fw-normal">Formularz kontaktowy</h1>

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
      <input type="name" name="imie" class="form-control" id="floatingPassword" placeholder="Imie" style="margin-top: 20px; margin-bottom: 20px;" required>
      <label for="floatingPassword">Imie</label>
      
      
    </div>
    <div class="form-floating">
      <textarea style="min-height: 400px;" name="message" class="form-control" id="floatingInput" placeholder="Wpisz swoją wiadomość" style="margin-top: 20px; margin-bottom: 20px;" required></textarea>
      <label for="floatingInput">Wpisz swoją wiadomość</label>
      
      
    </div>
    

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name ="zgoda"> Zgadzam się na przetwarzanie danych w celu komunikacji.
        <?php
                if(isset($_SESSION['b_zgoda']))
                {
                    echo $_SESSION['b_zgoda'];
                    unset ($_SESSION['b_zgoda']);


                }

        ?>
      </label>
      
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" value="Wyślij">Wyślij</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
</main>
</body>
</html>