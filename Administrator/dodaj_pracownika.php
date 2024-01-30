
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Dodaj pracownik</title>
        <link rel="stylesheet" href="style.css">
          </head>
    <body>
  <header>
  <div class="navbar">
        <ul class="menu-items" id="menuItems">
        <li><a href="magazyn.php">Strona główna</a></li>
        <li><a href="wyswietlanie_danych.php">Wszystkie przedmioty</a></li>
        <li><a href="znajdz_produkt.php">Znajdz produkt</a></li>
        <li><a href="dodaj.php">Dodaj przedmiot</a></li>
        <li><a href="usun.php">Wydaj przedmiot</a></li>
        <li><a href="dodaj_pracownika.php">Dodaj pracownika</a></li>
        <li><a href="Zwolnij.php">Zwolnij pracownika</a></li>
        <li><right><a href="logout.php">Wyloguj</a></li></right>
        </ul>
    </div>
  </header>

  <main>
  <section>
      <h1>Tutaj mozesz dodac pracownika do bazy danych. </h1>
    </section>
    <form method="post">
    <center>Podaj rangę w firmie.</center>
    <center> <input type="text" name="ranga" placeholder="Rangę w firmie" ><br><br></center>
    <center>Wpisz nazwę użytkownika.</center>
    <center> <input type="text" name="nazwa_u" placeholder="Wpisz nazwę użytkownika" ><br><br></center>
    <center>Wpisz hasło użytkownika</center>
    <center> <input type="text" name="haslo" placeholder="Wpisz haslo uzytkownika" ><br><br></center>
    <center>Wpisz imię pracownika/wlasciciela.</center>
    <center> <input type="text" name="imie" placeholder="Wpisz imię pracownika/wlasciciela" ><br><br></center>
    <center>Wpisz nazwisko pracownika/wlasciciela.</center>
    <center> <input type="text" name="nazwisko" placeholder="Wpisz nazwisko pracownika/wlasciciela" ><br><br></center>
    <center>Wpisz pesel pracownika</center>
    <center>  <input type="text" name="pesel" placeholder="Wpisz pesel pracownika" ><br><br></center>
    <center>  <input type="submit" value="Dodaj"><br></center>
    </form>
   
    <?php 
    session_start();
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
   
    
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $ranga = $_POST['ranga'];
            $nazwa_u = $_POST['nazwa_u'];
            $haslo = $_POST['haslo'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $pesel = $_POST['pesel'];
            $zapytanie = "INSERT INTO user (Ranga, Nazwa_u, Haslo, Imie, Nazwisko, Pesel) VALUES ('$ranga','$nazwa_u','$haslo','$imie','$nazwisko','$pesel')";
    
    if ($polaczenie->query($zapytanie) === TRUE) {
      echo "<center>Użytkownik został dodany do bazy danych.</center>";
  } else {
      echo "Błąd: " . $zapytanie . "<br>" . $polaczenie->error;
  }
}
  

$polaczenie->close();
?>

    <section>
      <h2>Kontakt</h2>
      <p>Skontaktuj się z nami, aby dowiedzieć się więcej o naszych usługach.</p>
      <p>Telefon: 123-456-789</p>
      <p>Email: info@magazyn.pl</p>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Magazyn XYZ. Wszelkie prawa zastrzeżone.</p>
  </footer>
</body>
</html>