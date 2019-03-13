<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord {
//    public function getProducts() {
//        return $this->hasMany(Products::className(), ['product_id' => 'id']);
//    }
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])
        ->viaTable('products_categories', ['pc_product_id' => 'id']);
    }
}

