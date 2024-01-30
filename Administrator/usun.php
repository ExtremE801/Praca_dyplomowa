<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Wydaj produkt</title>
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
      <h1>Tutaj możesz wydać produkt klientowi. </h1>
    </section>
    <form method="post">
    <center> <form action="usuwanie_przedmiotow.php" method="post"></center>
    <center>Nazwa Przedmiotu.</center>
    <center><input type="text" name="nazwa"><br></center>
    <center>Ilość.</center>
    <center> <input type="number" name="ilosc"><br></center>
    <center> <input type="submit" value="Usuń przedmioty"></center>
</form>
    </form>

    
    <?php 
    session_start();
    require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pobranie danych z formularza
  $nazwa = $_POST["nazwa"];

  $ilosc = $_POST["ilosc"];

  // Zapytanie do bazy danych w celu znalezienia produktu
  $sql = "SELECT * FROM produkty WHERE Nazwa = '$nazwa'";
  $result = $polaczenie->query($sql);

  // Sprawdzenie, czy produkt istnieje w bazie danych
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $iloscAktualna = $row["Ilość"];

      // Sprawdzenie, czy ilość do usunięcia jest mniejsza lub równa dostępnej ilości
      if ($ilosc <= $iloscAktualna) {
          // Aktualizacja ilości produktu w bazie danych
          $iloscNowa = $iloscAktualna - $ilosc;
          $sql = "UPDATE produkty SET Ilość = '$iloscNowa' WHERE Nazwa = '$nazwa'";
          if ($polaczenie->query($sql) === TRUE) {
              echo "Produkt został usunięty.";
          } else {
              echo "Wystąpił błąd podczas usuwania produktu: " . $polaczenie->error;
          }
      } else {
          echo "Nie wystarczająca ilość produktu w magazynie.";
      }
  } else {
      echo "Podany produkt nie istnieje w bazie danych.";
  }

  // Zamykanie połączenia z bazą danych
  $polaczenie->close();
}
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