<!DOCTYPE html>
<html lang="en">
<head>
    <title>O firmie</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="blog.css">

</head>
<body>
<?php include("header.php"); 

require_once "connect2.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_errno!=0)
{
  echo "Błąd połączenia z bazą";


}
else
{

  $zapytanie= "SELECT id, tytul, podtytul, tresc FROM content WHERE id = '5'";
  @$wynik_zapytania=mysqli_query($polaczenie,$zapytanie);
  if($wynik_zapytania == false)
  {
    echo "Błąd zapytania SQL";

  }
  else
  {
    $wiersz = mysqli_fetch_array($wynik_zapytania);
      $tytuls=$wiersz['tytul'];
      $podtytuls=$wiersz['podtytul'];
      $trescs=$wiersz['tresc'];
    
    

  }

}



?>
<main class="container">
<div class="row g-5" style="margin-top: 20px;">
    <div class="col-md-8">
      

      <article class="blog-post">
        <h1 class="blog-post-title mb-1">
        <?php 
          echo $tytuls;
        ?>

        </h1>
        
        
        
        <?php
          echo $podtytuls; 

        ?>  
        <hr>
        <?php
          echo $trescs; 
        ?>
      </article>
           
    <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary rounded-pill" href="formularz.php">Masz jakieś pytania? Kliknij tutaj!</a>
        
    </nav>
    
    </div>

    

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