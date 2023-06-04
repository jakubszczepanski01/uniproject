<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kalkulator</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">
    <link rel="stylesheet" href="pricing.css">

</head>
<body>
<?php include("header.php"); 
error_reporting(0);




?>
<main class="form-signin w-100 m-auto">
<div class="row g-5" style="margin-top: 20px;">
<form method="post" id="form1">
    
    <h1 class="h3 mb-3 fw-normal">Obliczanie przybliżonej ceny pojedyńczej usługi</h1>
    <p> * ceny pakietów wielu usług są obliczane indywidualnie po założeniu konta, złożeniu zamówienia na usługę oraz dostosowaniu oferty przez pracownika.</p>
    <div class="form-floating">
      <input type="text" name="budget" class="form-control" id="floatingInput" placeholder="200" style="margin-top: 25px; margin-bottom: 20px;" required>
      <label for="floatingInput">Miesięczny budżet na reklamę</label>
    </div>
    <div class="radio">
      <input type="radio" name="choice1" id="floatingRadio1" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingRadio">Reklama w Google Ads</label>
      
      
    </div>
    <div class="radio">
      <input type="radio" name="choice2" id="floatingRadio2" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingRadio">Reklama w Facebook Ads</label>
      
      
    </div>
    <div class="radio">
      <input type="radio" name="choice3" id="floatingRadio3" style="margin-top: 20px; margin-bottom: 20px;">
      <label for="floatingRadio">Reklama w wyszukiwarce</label>
      
      
    </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit" value="Oblicz">Oblicz</button>
</form>
<?php
  $budzet = $_POST['budget'];
 
  if(isset($_POST['choice1']))
    {
      
      $zasieg = $budzet * 179.15;
      $zasieg = round($zasieg,0) - 1;
      $wycena = $budzet + 300;
      echo "<b> Google Ads - przybliżony koszt całej usługi wyniesie ".$wycena."zł, przy przybliżonym zasięgu ".$zasieg. " użytkowników </b>";

    }
  if(isset($_POST['choice2']) )
    {
      $zasieg = $budzet * 180.15;
      $zasieg = round($zasieg,0) - 1;
      $wycena = $budzet+ 250;
      echo "<b> Facebook Ads - przybliżony koszt całej usługi wyniesie ".$wycena."zł, przy przybliżonym zasięgu ".$zasieg. " użytkowników </b>";

    }
    if(isset($_POST['choice3']) )
    {
      $zasieg = $budzet * 389.15;
      $zasieg = round($zasieg,0) - 1;
      $wycena = $budzet+ 250;
      echo "<b> Reklama w wyszukiwarce - przybliżony koszt całej usługi wyniesie ".$wycena."zł, przy przybliżonym zasięgu ".$zasieg. " użytkowników </b>";

    }
?>
    

</main>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com"><img src="images/fb.jpg" width="24" height="24"><use xlink:href="https://www.facebook.com"></use></a></li>
      <li class="ms-3"><a class="text-muted" href="https://twitter.com"><img src="images/twt.jpg" width="24" height="24"><use xlink:href="https://www.facebook.com"></use></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com"><img src="images/ig.jpg" width="24" height="24"><use xlink:href="https://www.facebook.com"></use></a></li>
    </ul>
  </footer>
    


</body>
</html>