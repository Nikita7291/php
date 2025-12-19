<?php
	$now = time();
    $birthday = mktime(0, 0, 0, 11, 3, (int) date('Y'));
    $hour = getdate()['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	if ($hour >= 0 && $hour < 6)
        $welcome = 'Доброй ночи';
    elseif ($hour >= 6 && $hour < 12)
        $welcome = 'Доброе утро';
    elseif ($hour >= 12 && $hour < 18)
        $welcome = 'Добрый день';
    elseif ($hour >= 18 && $hour < 23)
        $welcome = 'Добрый вечер';
    else
        $welcome = 'Доброй ночи';

    setlocale(LC_TIME, 'ru_RU.UTF-8');

    $fmt = datefmt_create(
        'ru_RU',
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        'Europe/Moscow',
        IntlDateFormatter::GREGORIAN,
        "Сегодня d MMMM Y года, EEEE H:mm:ss"
    );

    $formattedDate = datefmt_format($fmt, $now);

    $timeToBirthday = $birthday - $now;

    //если др уже прошёл, устанавливаем на следующий год
    if ($timeToBirthday < 0) {
        $birthday = mktime(0, 0, 0, 11, 9, (int) date('Y') + 1);
        $timeToBirthday = $birthday - $now;
    }
    $days = floor($timeToBirthday / (60 * 60 * 24));
    $hours = floor(($timeToBirthday % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($timeToBirthday % (60 * 60)) / 60);
    $seconds = $timeToBirthday % 60;

    ?>

    <p><?= $welcome ?>
    <p><?= $formattedDate ?>
    <p>До моего дня рождения: <?= "$days дней, $hours часов, $minutes минут, $seconds секунд" ?>
	?>
</body>
</html>