<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Towns;
use app\models\products;
use Yii;

class TownsController extends AppController {
    public function actionIndex() {
        $towns = Towns::find(); 
        
        $pagination = new Pagination([
            'defaultPageSize' => 80,
            'totalCount' => $towns->count()
        ]);
        
        $towns = $towns->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('index',
            ['towns' => $towns,
            'pagination' => $pagination
        ]);
    }
    public function actionView($id) {
        $products = Products::find()
            ->leftJoin('manufacturers', 'manufacturers.manufacture_id = products.product_manufacture')
            ->leftJoin('towns', 'towns.town_id = manufacturers.manufacture_town')
            ->where(['towns.town_id' => $id]);
        
        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);
        
        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        $town = Towns::find()->where(['towns.town_id' => $id])->one(); 
        
        $manufacturers = Manufacturers::find()->where(['manufacture_town' => $id]);
        
        $pagination_manufacturers = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $manufacturers->count()
        ]);
        
        $manufacturers = $manufacturers->offset($pagination_manufacturers->offset)
            ->limit($pagination_manufacturers->limit)
            ->all();
        
        return $this->render('view',
            ['products' => $products,
            'pagination_products' => $pagination_products,
            'town' => $town,
            'manufacturers' => $manufacturers,
            'pagination_manufacturers' => $pagination_manufacturers
        ]);
    }
}