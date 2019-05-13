<?php

namespace app\models;

use yii\db\ActiveRecord;

class Recipe extends ActiveRecord
{
    public function rules() {
        return [
            [['name', 'description'], 'required']
        ];
    }

    public function getIngredients() {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])
            ->viaTable('xref_recipe_ingredient', ['recipe_id' => 'id']);
    }
}