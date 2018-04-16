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


    private function prepareImage()
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
        parent::__construct($id, $name,$description, $image, $price);
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


}


$product = new Product(1, "Casio", "Наручные часы", "img/model_1.jpg");
$product->getProductsList();

$product2 = new Product(2, "Casio2", "Наручные часы2", "img/model_2.jpg");
$product2->getProductsList();

$card = new Card(2, "Casio2", "Наручные часы2", "img/model_2.jpg", 100);
$card->display();