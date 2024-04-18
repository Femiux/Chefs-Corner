<?php

require_once('session.php');
checkLoggedIn();
include ("header.php");
include ("showrecipe.php");
include ("submitrating.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css\mystyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:300,400,700'>
    <script>
        function performSearch() {
            var input = document.getElementById('searchInput');
            var searchTerm = input.value;
            var resultsContainer = document.getElementById('searchResults');
            if (searchTerm.length === 0) {
                resultsContainer.innerHTML = '';
                return;
            }
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search.php?q=' + encodeURIComponent(searchTerm), true);
            xhr.onload = function() {
                if (this.status === 200) {
                    resultsContainer.innerHTML = this.responseText;
                } else {
                    resultsContainer.innerHTML = 'An error occurred during the search.';
                }
            };
            xhr.send();
        }
    </script>
</head>

<body>

    <section class="hero">
        <div class="col-md-6 col-sm-6 mt-3">

            <div class="hero-small-box " role="form" action="" method="post">

                <div class="section-title">
                    <h3>"Everything appeared to be in season, and the recipes are seasonal." 
                        <br>
                        Having a recipe selection allowed us to prepare meals we truly enjoyed.</h3>
                </div>

                <!--<div>
                    <button onclick="searchRecipes()" class="search-button">Find Recipe</button>
                </div>-->

            </div>

        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4>Find Recipe by:</h4>
                            </div>
                        </div>
                    </div>



                   
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="search" class="search-input form-control" id="searchInput" placeholder="Search recipes..." aria-label="Search" oninput="performSearch()">
                        
                    </div>

                    <div class="join-form col-mt-3">
                        <button onclick="filterRecipes()" class="search-button">Find Recipe</button>
                    </div>

                </div>

            </div>


        </div>

    </section>

    <div class="search-results mt-2" id="searchResults">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>See Latest Recipe</h2>
            </div>
        </div>
    </div>


    <section>



        <div class="recipe-container" id="recipeContainer">
            <div class="row">
                <?php $count = 0; ?>
                <?php foreach ($recipes as $recipe): ?>
                    <?php if ($count % 3 == 0 && $count != 0): ?>
                    </div>
                    <div class="row">
                    <?php endif; ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="#" class="recipe-card-link" data-toggle="modal" data-target="#recipeModal"
                            onclick="showRecipeDetails(<?php echo $recipe['recipe_id']; ?>)">
                            <div class="recipe-card" style="width: 25rem;" data-recipe-id="<?php echo $recipe['recipe_id']; ?>">
                                    <img class="recipe-image" src="uploads/<?php echo $recipe['file_Name']; ?>" alt="<?php echo $recipe['recipe_name']; ?>" 
                                    alt="<?php echo $recipe['recipe_name']; ?> ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $recipe['recipe_name']; ?>
                                    </h5>
                                    <p class="card-text">Category:
                                        <?php echo $recipe['category']; ?>
                                    </p>
                                    <p class="card-text">Location:
                                        <?php echo $recipe['cuisine']; ?>
                                    </p>
                                    <p class="card-text">Duration:
                                        <?php echo $recipe['duration']; ?>
                                    </p>
                                    <div class="rating-container">
                                        <div class="rating-stars">
                                            <span class="star" data-value="1">&#9733;</span>
                                            <span class="star" data-value="2">&#9733;</span>
                                            <span class="star" data-value="3">&#9733;</span>
                                            <span class="star" data-value="4">&#9733;</span>
                                            <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                    </div>

                                    <a href="#" class="card-link">See more</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $count++; ?>
                    <?php if ($count % 3 == 0): ?>
                    </div>
                    <div class="row">
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($count % 3 != 0): ?>
                </div>
            <?php endif; ?>
        </div>




        <div class="back-to-top-container">
            <div class="back-to-top-button">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#suggestModal">Suggest New Recipe</a><br>
            </div>
        </div>

    </section>

    <section class="cta">
        <div class="wrap clearfix">
            <h2>Join over 10 million people creating on Chef's Corner.</h2>
            <a href="cheflogin.php" class="btn btn-primary">Become a Chef </a>
        </div>
    </section>

    <div class="container">

        <div class="container">
            <div class="row">
                <div class="modal fade" id="suggestModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Suggest A Recipe</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" method="post" action="suggestRecipe.php" role="form" enctype="multipart/form-data">
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Recipe Title*</label>
                                            <input id="form_name" type="text" name="recipe_name" class="form-control"
                                                placeholder="Give your Recipe a name *" required="required"
                                                data-error="Recipe name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                        

                                </div>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Description *</label>
                                            <textarea name="description" class="form-control" placeholder="Tell us a little bit more about this recipe. Why did you decide to cook it? For you, what makes it unique?"
                                                rows="4" required="required" data-error="Type description line by line."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" class="btn btn-success btn-send" value="Add Recipe">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end modal body content  -->
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2"></div>
            </div>
        </div>
    </div>

        <script>
            // Function to fetch recipes based on selected category
            function fetchRecipesByCategory() {
                var selectedCategory = document.getElementById("categoryFilter").value;
                fetchRecipes(selectedCategory, "");
            }

            // Function to fetch recipes based on selected location
            function fetchRecipesByLocation() {
                var selectedLocation = document.getElementById("categoryCuisine").value;
                fetchRecipes("", selectedLocation);
            }

            // Event listeners for the category and location dropdowns
            document.getElementById("categoryFilter").addEventListener("change", fetchRecipesByCategory);
            document.getElementById("categoryCuisine").addEventListener("change", fetchRecipesByLocation);
        </script>

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.star');
                const submitButton = document.getElementById('submit-rating');
                
                let selectedRating = 0;
                
                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        selectedRating = parseInt(this.getAttribute('data-value'));
                        updateStars(selectedRating);
                    });
                });
                
                submitButton.addEventListener('click', function() {
                    if (selectedRating !== 0) {
                        submitRating(selectedRating);
                    } else {
                        alert('Please select a rating.');
                    }
                });
                
                function updateStars(rating) {
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= rating) {
                            star.classList.add('active');
                        } else {
                            star.classList.remove('active');
                        }
                    });
                }
                
                function submitRating(rating) {
                    const recipeId = <?php echo $recipeId; ?>; // Fetch recipe ID from PHP
                    fetch('submitRating.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `recipeId=${recipeId}&rating=${rating}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Rating submitted successfully.');
                            // Update the displayed average rating
                            // You can refresh the page or update the rating dynamically
                        } else {
                            alert('Failed to submit rating.');
                        }
                    });
                }
            });



        </script>


    <script src="js/app.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/recipedata.js"></script>
    <script src="js/ratings.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <div class="modal fade" id="recipeModal" tabindex="-1" aria-labelledby="recipeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recipeModalLabel">Recipe Details</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="recipeDetails">
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
<footer>
    <div>
        <p>&copy; 2024 Chef's Corner. All rights reserved.</p>
    </div>
</footer>