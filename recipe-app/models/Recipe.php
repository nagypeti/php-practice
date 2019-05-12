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

    public function getIngredients() {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])
            ->viaTable('tbl_recipe_ingredient', ['recipe_id' => 'id']);
    }
}