<?php
 declare(strict_types=1);

 $login = ' User ';
 $password = 'megaP@ssw0rd';
 $name = 'иван';
 $email = 'ivan@petrov.ru';
 $code = '<?=$login?>';

 /**
  * Проверяет пароль на сложность.
  *
  * @param string $password Пароль.
  *
  * @return bool true, если в пароле есть цифры, большие и малые латинские
  *              буквы, а также его длина составляет не менее 8 символов,
  *              иначе false.
  */
 function check_password(string $password): bool {
     if (strlen($password) >= 8 &&
     strpbrk($password, 'abcdefghijklmnopqrstuvwxyz') &&
     strpbrk($password, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ') &&
     strpbrk($password, '1234567890')) {
         return true;
     }
     else {
         return false;
     }
 }
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Использование функций обработки строк</title>
 </head>
 <body>

  <?php
   echo '<pre>';

   $login = strtolower(trim($login));
   echo 'Новый $login: ', $login, PHP_EOL;

   if (check_password($password)) {
       echo 'Пароль хороший!', PHP_EOL;
   }
   else {
       echo 'Пароль слабый!', PHP_EOL;
   }

   $name = mb_ucfirst($name);
   echo 'Имя: ', $name, PHP_EOL;

   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       echo '$email корректен.', PHP_EOL;
   }
   else {
       echo '$email некорректен.', PHP_EOL;
   }

   echo htmlspecialchars($code), PHP_EOL;

   echo '</pre>';
  ?>

 </body>
</html>