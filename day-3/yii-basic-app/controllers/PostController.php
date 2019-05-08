<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostForm;
use yii\web\Controller;

class PostController extends Controller {

    public function actionIndex() {
        $posts = Post::find()
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'postForm' => new PostForm()
        ]);
    }

    public function actionAdd() {
        $data = \Yii::$app->request->post();
        $post = new Post();
        $post->attributes = $data['PostForm'];
        $post->save();
        return $this->redirect('index');
    }

     public function actionDelete($id) {
        $post = Post::findOne($id);
        $post->delete();
        return $this->redirect('index');
    }

    public function actionEdit($id) {
        $post = Post::find()
            ->where(['=', 'id', $id])
            ->one();
        return $this->render('edit', [
            'postForm' => new PostForm([
                'title' => $post->title,
                'content' => $post->content
            ]),
            'id' => $id
        ]);
    }

    public function actionUpdate($id) {
        $data = \Yii::$app->request->post();
        $post = Post::find()
            ->where(['=', 'id', $id])
            ->one();
        $post->attributes = $data['PostForm'];
        $post->save();
        return $this->redirect('index');
    }

}