<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%xref_recipe_ingredient}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%recipe}}`
 * - `{{%ingredient}}`
 */
class m190513_170834_create_xref_recipe_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%xref_recipe_ingredient}}', [
            'id' => $this->primaryKey(),
            'recipe_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `recipe_id`
        $this->createIndex(
            '{{%idx-xref_recipe_ingredient-recipe_id}}',
            '{{%xref_recipe_ingredient}}',
            'recipe_id'
        );

        // add foreign key for table `{{%recipe}}`
        $this->addForeignKey(
            '{{%fk-xref_recipe_ingredient-recipe_id}}',
            '{{%xref_recipe_ingredient}}',
            'recipe_id',
            '{{%recipe}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ingredient_id`
        $this->createIndex(
            '{{%idx-xref_recipe_ingredient-ingredient_id}}',
            '{{%xref_recipe_ingredient}}',
            'ingredient_id'
        );

        // add foreign key for table `{{%ingredient}}`
        $this->addForeignKey(
            '{{%fk-xref_recipe_ingredient-ingredient_id}}',
            '{{%xref_recipe_ingredient}}',
            'ingredient_id',
            '{{%ingredient}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%recipe}}`
        $this->dropForeignKey(
            '{{%fk-xref_recipe_ingredient-recipe_id}}',
            '{{%xref_recipe_ingredient}}'
        );

        // drops index for column `recipe_id`
        $this->dropIndex(
            '{{%idx-xref_recipe_ingredient-recipe_id}}',
            '{{%xref_recipe_ingredient}}'
        );

        // drops foreign key for table `{{%ingredient}}`
        $this->dropForeignKey(
            '{{%fk-xref_recipe_ingredient-ingredient_id}}',
            '{{%xref_recipe_ingredient}}'
        );

        // drops index for column `ingredient_id`
        $this->dropIndex(
            '{{%idx-xref_recipe_ingredient-ingredient_id}}',
            '{{%xref_recipe_ingredient}}'
        );

        $this->dropTable('{{%xref_recipe_ingredient}}');
    }
}
