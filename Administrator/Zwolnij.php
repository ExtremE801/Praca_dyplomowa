
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Zwolnij pracownika</title>
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
      <h1>Tutaj mozesz zwolnić pracownika. </h1>
    </section>
    <form method="post">
      <center>Wpisz imię pracownika/wlasciciela</center>
      <center><input type="text" name="imie" placeholder="Wpisz imię pracownika/wlasciciela" ><br><br></center>
      <center>Wpisz nazwisko pracownika/wlasciciela</center>
      <center><input type="text" name="nazwisko" placeholder="Wpisz nazwisko pracownika/wlasciciela" ><br><br></center>
      <center>Wpisz pesel pracownika</center>
      <center><input type="text" name="pesel" placeholder="Wpisz pesel pracownika" ><br><br></center>
      <center> <input type="submit" value="Zwolnij"><br></center>
    </form>
   
    <?php 
    session_start();
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pobranie imienia i nazwiska z formularza
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $pesel = $_POST['pesel'];
    
        $sql = "SELECT * FROM user WHERE Imie = '$imie' AND Nazwisko = '$nazwisko' AND Pesel = $pesel ";
        $result = $polaczenie->query($sql);
    
        if ($result->num_rows == 1) {
            // Usunięcie osoby z bazy danych
            $deleteSql = "DELETE FROM user WHERE Imie = '$imie' AND Nazwisko = '$nazwisko' AND Pesel = $pesel ";
            if ($polaczenie->query($deleteSql) === TRUE) {
                echo "<center>Osoba została pomyślnie usunięta.</center>";
            } else {
                echo "<center>Wystąpił błąd podczas usuwania osoby: </center>" . $polaczenie->error;
            }
        } else {
            echo "<center>Podane dane są nieprawidłowe.</center>";
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