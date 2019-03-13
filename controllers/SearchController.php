<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Products;
use Yii;
use app\models\SearchForm;
use yii\helpers\Html;

class SearchController extends AppController {
    public function beforeAction ($action) {
        $model = new SearchForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $q = Html::encode($model->q);
            return $this->redirect(Yii::$app->urlManager->createUrl(['search', 'q' => $q]));
        }
        return true;
    }
    
    public function actionIndex() {
        $q = Yii::$app->getRequest()->getQueryParam('q');
        $products = Products::find()->filterWhere(['like', 'product_name', '%'.$q.'%', false]);
        $manufacturers = Manufacturers::find()->filterWhere(['like', 'manufacture_name', '%'.$q.'%', false]);
        
        $pagination_products = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $products->count()
        ]);
        $pagination_manufacturers = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $manufacturers->count()
        ]);
        
        $products = $products->offset($pagination_products->offset)
            ->limit($pagination_products->limit)
            ->all();
        
        $manufacturers = $manufacturers->offset($pagination_manufacturers->offset)
            ->limit($pagination_manufacturers->limit)
            ->all();
        
        return $this->render('searchform', [
            'pagination_products' => $pagination_products,
            'products' => $products,
            'pagination_manufacturers' => $pagination_manufacturers,
            'manufacturers' => $manufacturers,
        ]);
    }
    
    public function actionSearchform() {
        return $this->render('searchform');      
    }
}