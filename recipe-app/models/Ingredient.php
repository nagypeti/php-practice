<?php

namespace app\models;

use yii\db\ActiveRecord;

class Ingredient extends ActiveRecord
{
    public function rules()
    {
        return [
            ['name', 'required']
        ];
    }

    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['id' => 'recipe_id'])
            ->viaTable('xref_recipe_ingredient', ['ingredient_id' => 'id']);
    }
}