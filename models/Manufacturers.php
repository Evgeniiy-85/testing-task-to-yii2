<?php

namespace app\models;

use yii\db\ActiveRecord;

class Manufacturers extends ActiveRecord {
    public function getManufacturers()
    {
        return $this->hasMany(Manufacturers::className(), ['id' => 'manufacture_id'])
        ->viaTable('products', ['product_id' => 'id']);
    }
}

