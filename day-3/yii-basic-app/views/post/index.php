<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
    
?>

<h1>Trending posts</h1>
<table class="table table-hover">
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= Html::encode($post->likes) ?></td>
            <td>
                <a href="/post/upvote?id=<?= $post->id ?>"><i class="material-icons">arrow_drop_up</i></a>
            </td>
            <td>
                <a href="/post/downvote?id=<?= $post->id ?>"><i class="material-icons">arrow_drop_down</i></a>
            </td>
            <td>
                <a href="<?= $post->content ?>"><?= Html::encode($post->title) ?></a>
            </td>
            <td>
                <a href="/post/edit?id=<?= $post->id ?>"><i class="material-icons">edit</i></a>
            </td>
            <td>
                <a href="/post/delete?id=<?= $post->id ?>"><i class="material-icons">delete</i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->render('_postForm', [
    'postForm' => $postForm,
    'buttonText' => 'Add',
    'action' => ['post/add']
]) ?>

