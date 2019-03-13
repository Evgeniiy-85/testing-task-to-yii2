<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Products;
use Yii;

class ManufacturersController extends AppController {
    public function actionIndex() {
        $products = Products::find();
        $manufacturers = Manufacturers::find();
        
        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);
        $pagination_manufactures = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $manufacturers->count()
        ]);
        
        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        $manufacturers = $manufacturers->offset($pagination_manufactures->offset)
            ->limit($pagination_manufactures->limit)
            ->all();
        
        return $this->render('index',
            ['manufacturers' => $manufacturers,
            'pagination_manufactures' => $pagination_manufactures,
        ]);
    }
    public function actionView($id) {
        $products = Products::find()->where(['product_manufacture' => $id]);

        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);

        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        return $this->render('view',
            ['products' => $products,
            'pagination_products' => $pagination_products,
        ]);
    }
}