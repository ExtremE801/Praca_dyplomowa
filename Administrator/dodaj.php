<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Dodaj produkt</title>
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
      <h1>Tutaj mozesz dodac produkty do bazy danych. </h1>
    </section>
    <form method="post">
      <center>Wpisz swój numer identyfikacji.</center>
      <center><input type="text" name="Numer" placeholder="Wpisz swój numer identyfikacji" style="width: 250px;" style="height: 220px;" ><br><br></center>
      <center>Wpisz nazwę produktu</center>
      <center> <input type="text" name="Nazwa" placeholder="Wpisz nazwę produktu" style="width: 250px;" style="height: 220px;" ><br><br></center>
      <center>Wpisz ilość produktów</center>
      <center><input type="text" name="Ilosc" placeholder="Wpisz ilość produktów" style="width: 250px;" style="height: 220px;"><br><br></center>
      <center>Wpisz Strefę produktu</center>
      <center><input type="text" name="Strefa" placeholder="Wpisz Strefę produktu" style="width: 250px;" style="height: 220px;"><br><br></center>
      <center> <input type="submit" value="Dodaj" style="width: 250px;" style="height: 220px;"><br></center>
    </form>
    <?php 
    session_start();
    require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$Numer = $_POST['Numer'];
$Nazwa = $_POST['Nazwa'];
$Ilosc = $_POST['Ilosc'];
$Strefa = $_POST['Strefa'];


$sql = "SELECT * FROM produkty WHERE nazwa = '$Nazwa'";
$result = $polaczenie->query($sql);

if ($result->num_rows > 0) {
 
    $row = $result->fetch_assoc();
    $Nazwa = $row['Nazwa'];
   

    $sql = "UPDATE produkty SET Ilość = Ilość + '$Ilosc' WHERE Nazwa = '$Nazwa'";
    if ($polaczenie->query($sql) === TRUE) {
        echo "Zaktualizowano ilość sztuk produktu.";
    } else {
        echo "Błąd podczas aktualizacji ilości sztuk produktu: " . $polaczenie->error;
    }
} else {
  
    $sql = "INSERT INTO produkty (User_Db, Nazwa, Ilość, Strefa) VALUES ('$Numer', '$Nazwa','$Ilosc', '$Strefa')";
    if ($polaczenie->query($sql) === TRUE) {
        echo "Dodano nowy produkt do bazy danych.";
    } else {
        echo "Błąd podczas dodawania nowego produktu: " . $polaczenie->error;
    }
}
}
$polaczenie->close();
?>
 <table id="Tab_produkty">
	<tr><th colspan=2>Produkty i ich miejsce</th></tr>
	<tr><td>1</td><td>Chleb</td></tr>
	<tr><td>2</td><td>Pomidor</td></tr>
	<tr><td>3</td><td>Ogórek</td></tr>
	<tr><td>4</td><td>Truskawki</td></tr>
</table>
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