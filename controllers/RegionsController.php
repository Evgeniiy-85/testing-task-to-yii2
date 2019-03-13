<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Regions;
use app\models\Towns;
use app\models\Products;
use Yii;

class RegionsController extends AppController {
    public function actionIndex() {
        $regions = Regions::find()
        ->orderBy(['region_id' => SORT_ASC])
        ->all(); 
        $count_regions = count($regions);
        
        $towns = Towns::find()->all(); 
        $count_towns = count($towns);
        
        return $this->render('index',
            ['regions' => $regions,
            'towns' => $towns,
            'count_regions' => $count_regions
        ]);
    }
    public function actionView($id) {
        $products = Products::find()
            ->innerJoin('manufacturers', 'manufacturers.manufacture_id = products.product_manufacture')
            ->innerJoin('towns', 'towns.town_id = manufacturers.manufacture_town')
            ->innerJoin('regions', 'regions.region_id = towns.town_region')
            ->where(['regions.region_id' => $id]);
            
        $region = Regions::find()->where(['regions.region_id' => $id])->one();
        
        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);
        
        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        $manufacturers = Manufacturers::find()
            ->innerJoin('products', 'products.product_manufacture = manufacture_id')     
            ->innerJoin('towns', 'towns.town_id = manufacture_town')
            ->innerJoin('regions', 'regions.region_id = towns.town_region')
            ->where(['regions.region_id' => $id])->limit(10);

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
            'region' => $region,
            'manufacturers' => $manufacturers,
            'pagination_manufacturers' => $pagination_manufacturers
        ]);
    }
}