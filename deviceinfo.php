<?php
session_start();
if(!isset($_SESSION['typUzytkownika'])){
  header("Location:login.php");
}
else{
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <Style>
        body {
  background-color: lightgray;
}

    </Style>
</head>
<body>
 

    <div >
      <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">Serwis Komputerowy</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Strona główna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">O Nas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Kontakt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" href="#">Mój profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white" href="#">Moje naprawy</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div>
        
        <div style="padding-top: 100px">
        <div class="container-fluid " style="width: 70%; pading:left" >
        
          
        <h5>
        <?php
        
          $idurzadzenia= $_GET['id'];
          

          $conn = @new mysqli('localhost','root','','serwiskomputerowy');
          if($conn->connect_error !=0){
            echo "wystąpił błąd połączenia".$conn->connect_error;
        }
        else{
          $sql = "SELECT * FROM urzadzenie WHERE idUrzadzenia='$idurzadzenia'";
          $result=$conn->query($sql);

          $sql1 = "SELECT * FROM owner WHERE typuzytkownika='Pracownik'";
          $result1=$conn->query($sql1);
          
          


          if($result!=null){
            while($row = $result->fetch_assoc()){
            echo "
            <div class='row enable-rounded:true' style=''>
              <div class='col-md-6 border border-dark border-1'>ID Urządzenia : </div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[idUrzadzenia]</div>
            </div>
             
            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Imię właściciela</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[imieWlasciciela]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Nazwisko właściciela</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[nazwiskoWlasciciela]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Adres E-mail Właściciela</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[adresEmailWlasiciela]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Numer telefonu Właściciela</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[numerTelefonuWlasciciela]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Typ rządzenia</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[typUrzadzenia]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Marka rządzenia</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[markaUrzadzenia]</div>
            </div>

            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Model rządzenia</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[modelUrzadzenia]</div>
            </div>

            <div class='row'>
            <div class='col-md-6 border border-dark border-1'>Problem opisany przez właściciela</div>
            <div class='col-6 col-md-4 border border-dark border-1'>$row[Problem]</div>
          </div>

          <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Dizagnoza</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[Diagnoza]</div>
            </div>
            <div class='row'>
              <div class='col-md-6 border border-dark border-1'>Czas przyjęcia</div>
              <div class='col-6 col-md-4 border border-dark border-1'>$row[DataObecna]</div>
            </div>
            
            ";
            $idpracownika = "$row[PrzypisanyPracownik]";
            }
          }
        if($_SESSION['typUzytkownika'] !='Uzytkownik' ):
          
      $sql2 = "SELECT 	Imie,Nazwisko FROM owner WHERE Id= '$idpracownika'";
      $result2=$conn->query($sql2);
      if($result2!=null){
        while($row2 = $result2->fetch_assoc()){
        echo "<div class='row'>
        <div class='col-md-6 border border-dark border-1'>Przypisany pracownik</div>
        <div class='col-6 col-md-4 border border-dark border-1'>$row2[Imie] $row2[Nazwisko]</div>
      </div>";
        }}

        echo "<form action='ZmienStan.inc.php' method='Post'>
          <div class='row'>
          <div class='col-md-6 border border-dark border-1'>Zmień stan urządzenia:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
          <div class='col-6 col-md-4 border border-dark border-1'>
          <select class='form-select' id='Stan' name='Stan' aria-label='Stan'>
            <option selected>Przyjęto</option>
            <option value='W czasie diagnozy'>W czasie diagnozy</option>
            <option value='Oczekuje na czesci'>Oczekuje na części</option>
            <option value='Oczekuje na potwierdzenie naprawy'>Oczekuje na potwierdzenie naprawy</option>
            <option value='W czasie naprawy'> W czasie naprawy</option>
            <option value='Do odbioru'>Do odbioru</option>
            <option value='Do utylizacji'>Do utylizacji</option>
            <option value='Niemożliwe do naprawy'>Niemożliwe do naprawy</option>
            <option value='Zrealizowane'>Zrealizowane</option>
          </select>
          <div class='d-flex justify-content-center'>
          <button style='width:150px' type='submit' class='form-control' id='submit' >Zmień stan</button>
          </div>
          </div>
        </div>
             </form>";
             echo "<form action='ZmienPrzypisanegoPracownika.inc.php' method='Post'>
             <div class='row'>
             <div class='col-md-6 border border-dark border-1'>Zmień przypisanego Pracownika:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
             <div class='col-6 col-md-4 border border-dark border-1'>
             <select class='form-select' id='Pracownik' name='Pracownik' aria-label='Pracownik'>
               <option selected>Wybierz Pracownika</option>";
          if($result1!=null)
          while($row1 = $result1->fetch_assoc()){
              echo "<option value='$row1[Id]'>$row1[Imie] $row1[Nazwisko]</option>";
          }
             echo"</select>
             <div class='d-flex justify-content-center'>
             <button style='width:150px' type='submit' class='form-control' id='submit' >Przypisz pracownika</button>
             </div>
             </div>
           </div>
                </form>";
                echo "<form action='Diagnoza.inc.php' method='Post'>
          <div class='row'>
          <div class='col-md-6 border border-dark border-1'>Zmień diagnozę:<input width='10px' type='text' name='iduz' class='visually-hidden' value='$idurzadzenia'> </div>
          <div class='col-6 col-md-4 border border-dark border-1'>
          <div class='mt-2'>
                  <textarea class='form-control' id='diagnoza' name='diagnoza' cols='40' rows='3' placeholder='Diagnoza (max 250 słów)' ></textarea>
                </div>
          <div class='d-flex justify-content-center'>
          <button style='width:150px' type='submit' class='form-control' id='submit' >Zaaktualizuj</button>
          </div>
          </div>
        </div>
             </form>";
        ?> 
        <?php echo"<div class='d-flex justify-content-center mt-2'>
        
        <a href='EdytujDane.php?id=$idurzadzenia'>
        
        <button class='btn btn-light' type='button'>Edytuj dane</button>
        </div>" ;
        endif;
        }
        ?>
        
        </a>
      </h5>
            </div>
            <div class="col-xs-6">
        
      </div>
        </div>
    </div>
      </div>
</div>
</body>
</html>