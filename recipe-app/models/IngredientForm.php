<?php

namespace app\models;

use yii\base\Model;

class IngredientForm extends Model
{
    public $name;

    public function attributeLabels()
    {
        return [
            'name' => 'Ingredients'
        ];
    }
    
}
