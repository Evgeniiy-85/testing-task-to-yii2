<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Products;
use Yii;

class ProductsController extends AppController {
    public function actionIndex() {
        $products = Products::find();

        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);
        
        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        return $this->render('index',
            ['products' => $products,
            'pagination_products' => $pagination_products,
        ]);
    }
    public function actionView($id) {
        $product = Products::find()->where(['product_id' => $id])->one();
        $manufacture = Manufacturers::find()->where(['manufacture_id' => $product->product_manufacture])->one();
        
        return $this->render('view',
            ['product' => $product,
            'manufacture' => $manufacture
        ]);
    }
}