<?php
namespace app\models; // подключаем пространство имён
use yii\db\ActiveRecord; // подключаем класс ActiveRecord
 
class Testing_task extends ActiveRecord // расширяем класс ActiveRecord 
{
    public static function tableName() {
        return "manufacturers";//имя таблицы
    }
}