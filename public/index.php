<?php

/*
 Класс Product - модель для работы с товарами
 */
class Product{
    protected $id;
    protected $name;
    protected $description;
    protected $image;
    protected $price;

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    public function __construct($id = null, $name = null, $description = null, $image= null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    // думаю, что нужно в этой функции получать товары из БД, обрабатывать запрос и получать массив товаров
    // выводить массив нужным образом ограничив количество выводимых товаров "const SHOW_BY_DEFAULT = 6;"
    public function getProductsList(){
        echo $this->prepareName() . $this->prepareDescription() . $this->prepareImage();
    }

    protected function prepareName()
    {
        return  "<h1>{$this->name}</h1>";
    }

    private function prepareDescription()
    {
        return "<p>{$this->description}</p>";
    }


    protected function prepareImage()
    {
        return "<img src= '{$this->image}' alt='image' width='200'>";
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}

class Card extends Product {
    public $price;

    public function __construct($id = null, $name = null, $description = null, $image= null, $price=null)
    {
        parent::__construct($id, $name, $description, $image);
        $this->price = $price;
    }


    public function display()
    {
        parent::getProductsList();
        $this->displayPrice();
    }

    public function displayPrice()
    {
        echo "<p>{$this->price}$</p>";
    }

    protected function prepareImage()
    {
        return "<img src= '{$this->image}' alt='image'>";
    }

}

$product = new Product(1, "Casio", "Наручные часы", "img/model_1.jpg");
$product->getProductsList();

$product2 = new Product(2, "Casio2", "Наручные часы2", "img/model_2.jpg");
$product2->getProductsList();

$card = new Card(2, "Casio2", "Наручные часы2", "img/model_2.jpg", 100);
$card->display();

/*class A {
    public function foo() {
        static $x = 0; // переменная объявлена в контектсте класса общая для всех с дефолтным значением 0;
        echo ++$x;
    }
}
$a1 = new A(); // создаем экземпляр объекта класса А
$a2 = new A(); // создаем еще один экземпляр объекта класса А
$a1->foo(); // вызываем метод класса А для объекта $a1 и значение $х становится = 1
$a2->foo(); // вызываем метод класса А для объекта $a2 и значение $х становится = 2
$a1->foo(); // снова вызываем метод класса А для объекта $a1 и значение $х еще раз переписывается становится = 3
$a2->foo(); // то же для  объекта $a2 и значение $х становится = 4
// все делается в контксте класса А(вне контекста объектов),  для разных объектов

class A {
    public function foo() {
        static $x = 0; // переменная объявлена в контектсте класса общая для всех с дефолтным значением 0;
        echo ++$x;
    }
}
class B extends A { // здесь своя переменная  в контектсте класса общая для всех с дефолтным значением 0;
}
$a1 = new A(); // создаем экземпляр объекта класса А
$b1 = new B(); // создаем экземпляр объекта класса B
$a1->foo(); // вызываем метод класса А для объекта $a1 и значение $х становится = 1
$b1->foo(); // вызываем метод класса B (в контексте класса В) для объекта $b1 и значение $х становится = 1
$a1->foo(); // еще раз вызываем метод класса А (в контексте класса А)для объекта $a1 и значение $х становится = 2
$b1->foo(); // еще раз вызываем метод класса B (в контексте класса B)для объекта $b1 и значение $х становится = 2


// так как мы не передаем никаких параметров конструктору, то скобки можно не ставить, результат будет тот же
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
*/