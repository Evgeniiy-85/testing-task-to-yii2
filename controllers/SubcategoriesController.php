<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Products;
use app\models\Categories;
use Yii;

class SubcategoriesController extends AppController {
    public function actionIndex() {
        $subcategories = Categories::find()->where(['<>', 'category_parent', 0]);
        
        $pagination_subcategories = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $subcategories->count()
        ]);
        
        $subcategories = $subcategories->offset($pagination_subcategories->offset)
            ->limit($pagination_subcategories->limit)
            ->all();
        
        return $this->render('index',
            ['subcategories' => $subcategories,
            'pagination_subcategories' => $pagination_subcategories
        ]);
    }
    
    public function actionView($id) {
        $products_subcategory = Products::find()
            ->leftJoin('products_subcategories', 'products.product_id = products_subcategories.pc_product_id')
            ->leftJoin('categories', 'categories.category_id = products_subcategories.pc_category_id')
            ->where(['category_id' => $id])
            ->andWhere(['<>', 'categories.category_parent', 0]);
        
        
        $pagination_products_subcategory = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products_subcategory->count()
        ]);

        $products_subcategory = $products_subcategory->offset($pagination_products_subcategory->offset)
            ->limit($pagination_products_subcategory->limit)
            ->all();
        
        $subcategory = Categories::find()->where(['category_id' => $id])->one();
        
        return $this->render('view',
            ['products_subcategory' => $products_subcategory,
            'pagination' => $pagination_products_subcategory,
            'subcategory' => $subcategory
        ]);
    }
}