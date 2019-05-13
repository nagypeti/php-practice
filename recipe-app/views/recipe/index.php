<?php

use yii\helpers\Html;

?>

<h1>Our recipe collection:</h1>

<?php foreach ($recipes as $recipe): ?>
    <h2><a href="/recipes/<?= $recipe->id ?>"><?= Html::encode($recipe->name) ?></a></h2>
    <p>
        <?= Html::encode(substr($recipe->description, 0, 300)) ?>
        <a href="/recipes/<?= $recipe->id ?>"> Continue reading ...</a>
    </p>
<?php endforeach; ?>