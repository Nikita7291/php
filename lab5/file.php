<?php
declare(strict_types=1);

define('FILENAME', 'db/users.txt');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname'], $_POST['lname'])) {
  $fname = trim(htmlspecialchars($_POST['fname']));
  $lname = trim(htmlspecialchars($_POST['lname']));

  $line = "$fname $lname\n";
  
  if (!is_dir('db')) {
      mkdir('db', 0755, true);
  }

  file_put_contents(FILENAME, $line, FILE_APPEND);

  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Работа с файлами</title>
</head>
<body>
  <h1>Заполните форму</h1>
  <form method="post">
    Имя: <input type="text" name="fname" required><br>
    Фамилия: <input type="text" name="lname" required><br>
    <br>
    <input type="submit" value="Отправить!">
  </form>

  <?php
  if (file_exists(FILENAME)) {
    $lines = file(FILENAME, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $lineNumber => $line) {
      echo ($lineNumber + 1) . '. ' . htmlspecialchars($line) . "<br>";
    }
    echo "<br>Размер файла: " . filesize(FILENAME) . ' байт.';
  }
  ?>
</body>
</html>