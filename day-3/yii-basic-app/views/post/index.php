<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
    
?>

<h1>Trending posts</h1>

<a href="/post/add" class="btn btn-primary">Submit new post</a>

<table class="table table-hover">
    <tr>
        <td>Likes</td>
        <td>Up</td>
        <td>Down</td>
        <td>Title</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td style="width: 5%"><?= Html::encode($post->likes) ?></td>
            <td style="width: 5%">
                <a href="/post/upvote?id=<?= $post->id ?>"><i class="large material-icons" role="button">arrow_drop_up</i></a>
            </td>
            <td style="width: 5%">
                <a href="/post/downvote?id=<?= $post->id ?>"><i class="large material-icons" role="button">arrow_drop_down</i></a>
            </td>
            <td style="width: 75%">
                <a href="<?= $post->content ?>"><?= Html::encode($post->title) ?></a>
            </td>
            <td style="width: 5%">
                <a href="/post/edit?id=<?= $post->id ?>"><i class="large material-icons" role="button">edit</i></a>
            </td>
            <td style="width: 5%">
                <a href="/post/delete?id=<?= $post->id ?>"><i class="large material-icons" role="button">delete</i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

