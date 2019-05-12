<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_recipe_ingredient}}`.
 */
class m190512_194300_create_tbl_recipe_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_recipe_ingredient}}', [
            'recipe_id' => $this->integer(),
            'ingredient_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tbl_recipe_ingredient}}');
    }
}
