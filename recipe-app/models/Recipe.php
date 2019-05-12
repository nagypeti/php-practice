<?php

namespace app\models;

use yii\db\ActiveRecord;

class Recipe extends ActiveRecord
{
    public function rules() {
        return [
            [['name', 'ingredients', 'description'], 'required'],
            ['likes', 'default', 'value'=>'0']
        ];
    }
}