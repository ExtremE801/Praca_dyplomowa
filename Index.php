
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Magazyn - Zaloguj</title>
        
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: center;
    }

    .container {
      width: 300px;
      margin: 100px auto;
      background-color: #fff;
      padding: 50px;
      border-radius: 50px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .container h2 {
      text-align: center;
    }

    .container input[type="text"],
    .container input[type="password"] {
      width:90%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .container input[type="submit"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: none;
      background-color: #4caf50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Logowanie</h2>
    <form method="POST">
      <center><input type="text" name="login" placeholder="Nazwa użytkownika" required></center>
      <center><input type="password" name="haslo" placeholder="Hasło" required></center>
      <center><input type="submit" value="Zaloguj"></center>
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
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
  
    // Zapytanie sprawdzające poprawność danych logowania
    $query = "SELECT * FROM user WHERE Nazwa_u = '$login' AND Haslo = '$haslo'";
    $result = $polaczenie->query($query);
    
    if ($result->num_rows == 1) {
        // Poprawne dane logowania
    
        $row = $result->fetch_assoc();
        $_SESSION['User_Db'] = $row['id'];
        $_SESSION['Ranga'] = $row['role'];
    
        if ($row['Ranga'] == 'Wlasciciel') {
            // Przekierowanie na stronę administratora
            header("Location: Administrator/magazyn.php");
        } else {
            // Przekierowanie na stronę użytkownika
            header("Location: Pracownik/magazyn.php");
        }
    } else {
        // Niepoprawne dane logowania
        echo "<center>Niepoprawna nazwa użytkownika lub hasło.</center>";
    }
  }
}
$polaczenie->close();
    ?>




    </form>
  </div>
  
</body>
</html>