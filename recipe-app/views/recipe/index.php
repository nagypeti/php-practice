<?php

use yii\helpers\Html;

?>

<h1>Our recipe collection:</h1>

<?php foreach ($recipes as $recipe): ?>
    <a href="/recipe/recipe?id=<?= $recipe->id ?>"><?= Html::encode($recipe->name) ?></a>
    <?php $recipeCharlimit = $recipe->substr(description, 0, 300); ?>
    <p><?= Html::encode($recipeCharlimit) ?><a href="/recipe/recipe?id=<?= $recipe->id ?>">Continue reading ...</a></p>
<?php endforeach; ?>