<?php
	
	session_start();  

		require_once "polaczenie.php";	
	
?>
<!DOCTYPE html>
<html lang="en" data-theme="white-black-layout" data-font="large-font">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wyszukiwarka przychodni</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="#">Wyszukiwarka przychodni</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="mt-3 ">
                <button type="button" id="font-small-btn" class="btn-circle btn btn-light">Aa</button>
                <button type="button" id="font-medium-btn" class="btn-circle btn btn-light">Aa</button>
                <button type="button" id="font-large-btn" class="btn-circle btn btn-light">Aa</button>  
              </div>
            </li>
            <li class="nav-item navbar-collapse d-sm-none d-none">
              <div class="divider-vertical"></div>
            </li>
            <li class="nav-item">
              <div class="mt-3 mb-2">
                <button type="button" id="style-white-black-btn" class="btn-circle btn btn-light">Aa</button>
                <button type="button" id="style-black-white-btn" class="btn-circle btn btn-light">Aa</button>
                <button type="button" id="style-yellow-black-btn" class="btn-circle btn btn-light">Aa</button>
                <button type="button" id="style-black-yellow-btn" class="btn-circle btn btn-light">Aa</button>
              </div>
            </li>    
          </ul>
        </div>  
      </nav>
    </header>
    <main>
      <section class="mb-5">
        <div class="description my-5">
          <h4>Wyszukiwarka placówek medycznych, w których pacjent uzyska bezpłatną pomoc lekarską.</h4>
        </div>
        <div class="search">
          <form action="index.php" method="GET">
            <div class="form-group">
              <label for="cityInput">Miejscowość: </label>
              <div class="d-flex">
                <input type="text" name="q1" class="form-control mr-1" id="cityInput" aria-describedby="city" placeholder="Wprowadź miejscowość">
                <button type="submit" class="btn btn-success search-btn">Wyszukaj</button>
              </div>
            </div>
          </form>
          <form action="index.php" method="GET">
            <div class="form-group">
              <label for="institutionName">Nazwa: </label>
              <div class="d-flex">
                <input type="text" name="q2" class="form-control mr-1" id="institutionName" aria-describedby="institition" placeholder="Wprowadź nazwę placówki">
                <button type="submit" class="btn btn-success search-btn">Wyszukaj</button>
              </div>
            </div>
          </form>
        </div>
      </section>

      <?php 
        $polaczenie = mysqli_connect ($host, $db_user, $db_password, $db_name);
        if (mysqli_connect_errno())
        {
          echo "Błąd połączenia: ".mysqli_connect_errno(); // błąd połączenia! rzuć wyjakiem
        }
        if (!$polaczenie->set_charset("utf8")) 
        {
        printf("Error loading character set utf8: %s\n", $polaczenie->error);
        exit();
        } 	
      ?>
      


      <section>
        <ul class="result-list list-group list-group-flush">

      <?php
        $wynik ='';
        
        if 	(isset($_GET['q1'])  && $_GET['q1']!== '')
        {
          $searchq = $_GET['q1'];
          $q1 = mysqli_query($polaczenie, "SELECT * FROM przychdonie WHERE Miejscowosc LIKE '%".$searchq."%' ");
          $c= mysqli_num_rows($q1);
          
      
          if ($c == 0)
          {
            echo '<h3> Nie znaleziono placówki w tej miejscowości.';
          }
          else
          {
            echo  '<h3>Znalezione placówki medyczne: </h3>';
            while ($wiersz = mysqli_fetch_array($q1))
                {
                    $ID=$wiersz['ID'];
                    $Miejscowosc=$wiersz['Miejscowosc'];
                    $Nazwa=$wiersz['Nazwa'];
                    $Adres=$wiersz['Adres'];
                    
                    echo '<li> ' .$Miejscowosc. ' '.$Adres.'; Nazwa placówki: '.$Nazwa.' - <b>NAJBLIŻSZY WOLNY TERMIN ZA: 'rand(1, 50)'</b></li>' ;
                    
                    
                    
                }
          }
        }
        $wynik ='';
    
          if 	(isset($_GET['q2'])  && $_GET['q2']!== '')
        {
          $searchq = $_GET['q2'];
          $q2 = mysqli_query($polaczenie, "SELECT * FROM przychdonie WHERE Nazwa LIKE '%".$searchq."%' ");
          $c= mysqli_num_rows($q2);
          
      
          if ($c == 0)
          {
            echo '<h3> Nie znaleziono placówki o takiej nazwie.';
          }
          else
          {
            echo  '<h3>Znalezione placówki medyczne: </h3>';
            while ($wiersz = mysqli_fetch_array($q2))
                {
                    $ID=$wiersz['ID'];
                    $Miejscowosc=$wiersz['Miejscowosc'];
                    $Nazwa=$wiersz['Nazwa'];
                    $Adres=$wiersz['Adres'];
                    
                    echo '<li> ' .$Miejscowosc. ' '.$Adres.'; Nazwa placówki: '.$Nazwa.' - <b>NAJBLIŻSZY WOLNY TERMIN ZA: 'rand(1, 50)'</b></li>' ;
                    
                    
                    
                }
          }
        }
        $wynik ='';
    
        mysqli_close	($polaczenie)	;
      ?>

        </ul>
      </section>
    </main>


    <!--JS LIBS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="scritps/script.js"></script>
</body>
</html>