<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'action' => $action,
])?>

<?=$form->field($recipeForm, 'name')?>
<?=$form->field($recipeForm, 'description')?>
<?=$form->field($ingredientForm, 'name')->textarea()?>

    <button type="submit">
        <?=$buttonText?>
    </button>

<?php ActiveForm::end()?>