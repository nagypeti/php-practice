<?php

namespace app\models;

use yii\base\Model;

class RecipeForm extends Model
{
    public $name;
    public $description;

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
