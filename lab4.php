<?php
$city = "Кременчук"; // Змінна $city
$years = 19; // Змінна $years
echo "Я живу у місті " . $city . " вже " . $years . " років.<br>"; // Конкатенація рядка за допомогою оператора "."

$colors = array("рожевий", "синій", "фіолетовий", "білий", "червоний"); // Масив $colors
echo "<br>Кольори: ";
foreach ($colors as $color) { // Цикл foreach
    echo $color . "<br>"; // Вивід елементу масива
}

// Хеш-масив
$person = array(
    "name" => "Дар'я",
    "age" => 19,
    "city" => "Кременчук"
);
echo "<br>" . $person["name"] . "<br><br>"; // Вивід даних за ключем "name"

// explode і implode
$str = "Мене звати Дар'я"; // Рядок
$words = explode(" ", $str); // Розбивання рядка на масив за пробілами
print_r($words); // Вивід масива
$newStr = implode(" ", $words); // Об'єднання масива в рядок з пробілами
echo "<br>" . $newStr . "<br>"; // Вивід рядка

// Розіменування змінних
$name = "Daria";
$$name = "19"; // Створюється змінна $Daria зі значенням "19"
echo "<br>" . $Daria . "<br>"; // Вивід значення змінної Daria

// Порівняння і приведення типів
$x = 10;
$y = "10";
if ($x == $y) {
    echo "<br>" . $x . " та \"" . $y . "\" - рівні"; // Виведеться це через автоматичне приведення типів
}
else {
    echo "<br>" . $x . " та \"" . $y . "\" - не рівні";
}

if ($x === $y) {
    echo "<br>" . $x . " та \"" . $y . "\" - тотожні";
}
else {
    echo "<br>" . $x . " та \"" . $y . "\" - не тотожні"; // Виведеться це, оскільки різні типи даних
}



// Батьківський клас "Animal"
class Animal {
    protected $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
}
// Наслідуваний клас "Dog" (нащадок класу "Animal")
class Dog extends Animal {
    private $color;
    public function __construct($name, $color) {
        parent::__construct($name);
        $this->color = $color;
    }
    public function getColor() {
        return $this->color;
    }
}
$dog = new Dog("Віллі", "рудий");
echo "<br><br>Собака: " . $dog->getName() . "<br>";
echo "Колір: " . $dog->getColor() . "<br>";



// Патерн сінглтон
class Singleton {
    private static $instance;
    private $data;
    private function __construct() {
        $this->data = "Це сінглтон!";
    }
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
    public function getData() {
        return $this->data;
    }
}

$singleton = Singleton::getInstance();
$data = $singleton->getData();
echo "<br>" . $data. "<br><br>";



// Клас CMS
class CMS {
    private $config;
    public function __construct($config) {
        $this->config = $config;
    }
    public function renderPage($page) {
        // Рендеринг сторінки за допомогою вказаних шаблонів та даних
        // Оперування налаштуваннями конфігурації CMS
        // Повернення HTML сторінки
    }
}
$config = [
    // Конфігураційні параметри для CMS
];
// Створення об'єкту CMS з використанням конфігурації
$cms = new CMS($config);
// Рендеринг сторінки
$page = 'page';
$cms->renderPage($page);



// Роутер
class Router {
    private $routes;
    public function __construct() {
        $this->routes = [];
    }
    public function addRoute($path, $callback) {
        $this->routes[$path] = $callback;
    }
    public function handleRequest($path) {
        if (array_key_exists($path, $this->routes)) {
            $callback = $this->routes[$path];
            $callback();
        } else {
            echo "404 - Page not found<br><br>";
        }
    }
}
// Створення роутера
$router = new Router();
// Додавання роутів
$router->addRoute('/', function() {
    echo "Home Page";
});
$router->addRoute('/about', function() {
    echo "About Page";
});
$router->addRoute('/contact', function() {
    echo "Contact Page";
});
// Отримання шляху з URL-адреси
$path = $_SERVER['REQUEST_URI'];
// Виклик функції обробки запиту в залежності від шляху
$router->handleRequest($path);



// Перевірка, чи існує параметр "id" в URL
if (isset($id)) {
    // Отримання значення параметра "id" з URL
    $id = $_GET['id'];
    // Відображення отриманого ідентифікатора
    echo "Отриманий ідентифікатор: " . $id;
} else {
    echo "Параметр 'id' відсутній в URL";
}

// Перевірка, чи був виконаний HTTP-запит методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримання даних з форми
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Виконання дій з отриманими даними
    // Повідомлення про успішне завершення дії
    echo "Дані успішно надіслано!";
}
else {
    echo "<br><br>Дані не відправлено";
}



// Робота з cookie
$cookieName = "username";
$cookieValue = "Daria Sydorenko";
setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/"); // Збереження cookie на 30 днів

if (isset($_COOKIE[$cookieName])) {
    $username = $_COOKIE[$cookieName];
    echo "<br><br>Вітаю, " . $username . "!"; // Використання значення cookie
}

// Робота з сесіями
session_start();
$_SESSION['user_id'] = 123;
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    echo "<br>Ваш ID користувача: " . $userId; // Використання значення сесії
}



// Логічні методи get, set, poll
class MyClass {
    private $data;
    public function __construct() {
        $this->data = [];
    }
    public function set($key, $value) {
        $this->data[$key] = $value;
    }
    public function get($key) {
        return $this->data[$key];
    }
    public function poll($key) {
        $value = $this->data[$key];
        unset($this->data[$key]);
        return $value;
    }
}
$myObject = new MyClass();
$myObject->set('name', 'John');
$name = $myObject->get('name');
$value = $myObject->poll('name');