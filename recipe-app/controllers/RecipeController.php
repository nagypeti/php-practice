<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Recipe;
use app\models\RecipeForm;

class RecipeController extends Controller
{

    public function actionIndex()
    {
        $recipes = new Recipe([
            'name' => 'asd',
            'description' => 'some',
            'ingredients' => 'onion'
        ]);

        return $this->render('index', [
            'recipe' => $recipes,
        ]);
    }

    public function actionAdd()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->urlManager->createUrl("site/login"));
        }else{
            return $this->render('add', [
                'recipeForm' => new RecipeForm()
            ]);
        }
    }

    public function actionSave()
    {
        $data = \Yii::$app->request->post();
        $recipe = new Recipe();
        $recipe->attributes = $data['RecipeForm'];
        if ($recipe->save()) {
            return $this->redirect('index');
        } else {
            var_dump($recipe->errors);
        }
    }


}