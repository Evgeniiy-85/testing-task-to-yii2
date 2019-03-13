<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\Manufacturers;
use app\models\Categories;
use app\models\Towns;
use app\models\Regions;
use yii\data\Pagination;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $categories = Categories::find()->where(['category_parent' => 0]);
        $subcategories = Categories::find()
            ->Where(['<>', 'categories.category_parent', 0])
            ->all();
        
        $manufacturers = Manufacturers::find();
        
        $count_categories = $categories->count();
        $count_manufacturers = $manufacturers->count();
        $count_towns = Towns::find()->count();
        $count_regions = Regions::find()->count();
        
        
        $categories = $categories
            ->all();
        
        $pagination_manufacturers = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $manufacturers->count()
        ]);
        
        $manufacturers = $manufacturers->offset($pagination_manufacturers->offset)
            ->limit($pagination_manufacturers->limit)
            ->all();
        
//        $manufacturers_categories = Categories::find()
////        ->leftJoin('products_categories', 'products_categories.pc_category_id = categories.category_id')
////        ->leftJoin('products', 'products.product_id = products_categories.pc_product_id')
////        ->leftJoin('manufacturers', 'manufacturers.manufacture_id = products.product_manufacture')       
////        ->where(['categories.product_id' => 'products_categories.pc_product_id'])
//        ->with('manufacturers')
//        ->limit(10)->all();
        
        
        
        return $this->render('index',
            ['categories' => $categories,
            'subcategories' => $subcategories,
            'count_categories' => $count_categories,
            'count_manufacturers' => $count_manufacturers,
            'count_regions' => $count_regions,
            'count_towns' => $count_towns,
            'manufacturers' => $manufacturers,
            'pagination_manufacturers' => $pagination_manufacturers
        ]);
    }
}
