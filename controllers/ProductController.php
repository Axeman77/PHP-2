<?php
namespace app\controllers;

use app\base\App;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo "catalog";
    }

    public function actionCard()
    {
        // $this->useLayout = false;
        $id = App::call()->request->getParams()['id'];var_dump($id);
        if(!$product = (new ProductRepository())->getOne($id)){
            throw new \Exception("Product not found");
        }
        echo $this->render('card', ['product' => $product]);
    }
}