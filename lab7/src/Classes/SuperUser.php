<?php
declare(strict_types=1);
namespace src\Classes;

require_once 'User.php';

/**
 * SuperUser — модель пользователя с административными полномочиями.
 * * Данный класс расширяет базовый класс User, внедряя понятие "роль" (role).
 * Модифицирует стандартный вывод данных через метод showInfo().
 * * @package src\Classes
 */
class SuperUser extends User
{
    /**
     * Создание нового экземпляра супер-пользователя.
     * * Использует возможности PHP 8.0+ по продвижению свойств (constructor property promotion) 
     * для параметра role. Базовые данные передаются в конструктор родителя.
     * * @param string $name Имя субъекта
     * @param string $login Идентификатор для входа
     * @param string $password Секретный ключ доступа
     * @param string $role Назначенные права/группа доступа
     */
    public function __construct(
        string $name,
        string $login,
        string $password,
        public string $role
    ) {
        parent::__construct($name, $login, $password);
        // Инициализация $this->role происходит автоматически
    }

    /**
     * Генерирует расширенную карточку пользователя в формате HTML.
     * * Дополняет базовый список характеристик текущей ролью пользователя.
     * Возвращает структурированный блок для отображения в интерфейсе.
     * * @return string Сформированная HTML-разметка
     */
    public function showInfo(): string
    {
        return "<div class=\"super-user-info\">
                    <h3>Super User Info</h3>
                    <p><strong>Name:</strong> {$this->name}</p>
                    <p><strong>Login:</strong> {$this->login}</p>
                    <p><strong>Role:</strong> {$this->role}</p>
                </div>";
    }
}