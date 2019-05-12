<?php

namespace app\models;

use yii\db\ActiveRecord;

class Unit extends ActiveRecord
{
    public function rules() {
        return [
            ['type', 'required']
        ];
    }
}