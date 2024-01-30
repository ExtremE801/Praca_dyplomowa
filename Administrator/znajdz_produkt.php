<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Znajdz produkt</title>
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
      <h1>W tym miejscu znajdziesz wyszukiwany produkt czy znajduje sie na magazynie i w jakiej ilosci </h1>
    </section>
    
    <form method="post">
    <center>Wpisz nazwę produktu.</center>
     <center> <input type="text" name="znajdz" placeholder="Wpisz nazwę produktu" style="width: 250px;" style="height: 220px;" ></center>
     <center> <input type="submit" value="Wyszukaj"></center>
      
    </form>
   
    <?php 
    session_start();
    require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $znajdz = $_POST['znajdz'];

  
    $sql = "SELECT  Nazwa, SUM(Ilość) as Ilość, Strefa FROM produkty WHERE Nazwa = '$znajdz' GROUP BY nazwa";
    $result = $polaczenie->query($sql);

    if ($result->num_rows > 0) {
       
        echo "<table>
                <tr>
                    <th>Nazwa </th>
                    <th>Ilość </th>
                    <th>Strefa </th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['Nazwa']."</td>
                    <td>".$row['Ilość']."</td>
                    <td>".$row['Strefa']."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<center>Brak wyników.</center>";
    }
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