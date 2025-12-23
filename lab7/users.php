<?php
declare(strict_types=1);

use App\Classes\User;
use App\Classes\SuperUser;

spl_autoload_register(function ($class): void {
    // Превращаем App\Classes\User в путь src/Classes/User.php
    $path = str_replace('App', 'src', $class);
    $file = __DIR__ . '/' . str_replace('\\', '/', $path) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>User Info</title>
    <link rel=\"stylesheet\" href=\"css/style.css\">
</head>
<body>";

$user1 = new User("Денис", "denchik", "pass1");
$user2 = new User("тип", "tipka", "pass2");
$user3 = new User("вовчик", "vwvw", "pass3");

echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();

$user = new SuperUser("Admin", "w_admin", "pass4", "administrator");
echo $user->showInfo();

unset($user1, $user2, $user3, $user);

echo "</body></html>";