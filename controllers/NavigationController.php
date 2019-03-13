<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Manufacturers;
use app\models\Regions;
use app\models\Towns;
use Yii;

class NavigationController extends AppController {
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
}