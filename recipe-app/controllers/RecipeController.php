<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Ingredient;
use app\models\IngredientForm;
use app\models\Recipe;
use app\models\RecipeForm;

class RecipeController extends Controller
{

    public function actionIndex()
    {
        $recipes = Recipe::find()
            ->all();

        return $this->render('index', [
            'recipes' => $recipes,
        ]);
    }

    public function actionAdd()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->urlManager->createUrl("site/login"));
        }else{
            return $this->render('add', [
                'recipeForm' => new RecipeForm(),
                'ingredientForm' => new IngredientForm()
            ]);
        }
    }

    public function actionSave()
    {
        $data = Yii::$app->request->post();

        $recipe = new Recipe();
        $ingredients = [];

        $recipe->attributes = $data['RecipeForm'];
        $recipe->save();
        $ingredientsArray = explode('\r\n',$data['IngredientForm']['name']);
        $length = count($ingredientsArray);

        for ($i=0; $i < $length; $i++) { 
            $ingredients[$i] = new Ingredient();
            $ingredients[$i]->name = $ingredientsArray[$i];
            $ingredients[$i]->save();
            $ingredients[$i]->link('recipes', $recipe);
        }
        
        return $this->redirect('/recipes');
    }

    public function actionShowrecipebyid($id)
    {
        $recipe = Recipe::find()
            .where(['id' => $id])
            .one();

        $ingredients = $recipe->ingredients;

    }


}