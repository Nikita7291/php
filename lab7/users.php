<?php
declare(strict_types=1);

// 1. Исправляем namespace здесь (было App, стало src)
use src\Classes\User;
use src\Classes\SuperUser;

spl_autoload_register(function ($class): void {
    // 2. Упрощаем автозагрузчик. 
    // Поскольку namespace (src\Classes) теперь совпадает с папкой (src/Classes), 
    // нам просто нужно заменить обратные слэши на прямые.
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    
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

// Эти вызовы теперь сработают, так как они ссылаются на src\Classes
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
