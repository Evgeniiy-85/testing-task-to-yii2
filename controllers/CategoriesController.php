<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Products;
use app\models\Categories;
use Yii;

class CategoriesController extends AppController {
    public function actionIndex() {
        $categories = Categories::find()->where(['category_parent' => 0]);
        $subcategories = Categories::find()
            ->Where(['<>', 'categories.category_parent', 0])
            ->all();
        
        $manufacturers = Manufacturers::find();
        
        $count_categories = $categories->count();
        $count_manufacturers = $manufacturers->count();
        
        $categories = $categories->offset($pagination_categories->offset)
            ->limit($pagination_categories->limit)
            ->all();
        
        return $this->render('index',
            ['categories' => $categories,
            'subcategories' => $subcategories,
            'count_categories' => $count_categories,
            'count_manufacturers' => $count_manufacturers
        ]);
    }
    
    public function actionView($id) {
        $products_category = Products::find()
            ->leftJoin('products_categories', 'products.product_id = products_categories.pc_product_id')
            ->leftJoin('categories', 'categories.category_id = products_categories.pc_category_id')
            ->where(['category_id' => $id]);
        
        $pagination_products_category = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products_category->count()
        ]);

        $products_category = $products_category->offset($pagination_products_category->offset)
            ->limit($pagination_products_category->limit)
            ->all();
        
        $category = Categories::find()->where(['category_id' => $id])->one();
        
        return $this->render('view',
            ['products_category' => $products_category,
            'pagination_products_category' => $pagination_products_category,
            'category' => $category
        ]);
    }
}