<h2>Add your recipe</h2>

<?=$this->render('_recipeForm', [
    'recipeForm' => $recipeForm,
    'ingredientForm' => $ingredientForm,
    'buttonText' => 'Submit',
    'action' => ['recipe/save'],
])?>