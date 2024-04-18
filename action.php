<?php
include('Recipe.php'); 
$recipe = new Recipe(); 

if(!empty($_POST['action']) && $_POST['action'] == 'listRecipe') {
    $recipe->recipeList();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addRecipe') { 
    $recipe->addRecipe(); 
}

if(!empty($_POST['action']) && $_POST['action'] == 'getRecipe') {
    $recipe->getRecipe(); 
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateRecipe') { 
    $recipe->updateRecipe(); 
}

if(!empty($_POST['action']) && $_POST['action'] == 'recipeDelete') { 
}
