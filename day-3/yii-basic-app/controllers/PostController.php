<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostForm;
use yii\web\Controller;

class PostController extends Controller
{

    public function actionIndex()
    {
        $posts = Post::find()
            ->orderBy(['likes' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'postForm' => new PostForm(),
        ]);
    }
    
    public function actionAdd() 
    {
        return $this->render('add', [
            'postForm' => new PostForm()
        ]);
    }

    public function actionSave()
    {
        $data = \Yii::$app->request->post();
        $post = new Post();
        $post->attributes = $data['PostForm'];
        if ($post->save()) {
            return $this->redirect('index');
        } else {
            var_dump($post->errors);
        }
    }

    public function actionDelete($id)
    {
        $post = Post::findOne($id);
        $post->delete();
        return $this->redirect('index');
    }

    public function actionEdit($id)
    {
        $post = Post::find()
            ->where(['=', 'id', $id])
            ->one();
        return $this->render('edit', [
            'postForm' => new PostForm([
                'title' => $post->title,
                'content' => $post->content,
            ]),
            'id' => $id,
        ]);
    }

    public function actionUpdate($id)
    {
        $data = \Yii::$app->request->post();
        $post = Post::find()
            ->where(['=', 'id', $id])
            ->one();
        $post->attributes = $data['PostForm'];
        if ($post->save()) {
            return $this->redirect('index');
        } else {
            var_dump($post->errors);
        }
    }

    public function actionUpvote($id)
    {
        $post = Post::findOne($id);
        $post->likes++;
        $post->save();
        return $this->redirect('index');
    }

    public function actionDownvote($id)
    {
        $post = Post::findOne($id);
        $post->likes--;
        $post->save();
        return $this->redirect('index');
    }

}
