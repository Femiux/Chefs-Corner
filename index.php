<?php 
session_start();
include("showrecipe.php");

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
    <section class="navbar navbar-fixed-top" role="navigation">
    
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
    
            <a href="index.php" class="navbar-brand">CHEF CORNER</a>
        </div>
    
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About Us</a></li>
                <li><a href="#faq" class="smoothScroll">FAQ</a></li>
            </ul>
    
            <nav class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="cheflogin.php" class="highlighted-btn">Become a Chef</a></li>
                    <li><a href="login.php" class="filled-btn">Sign In</a></li>
                </ul>
            </nav>
        </nav>
    </section>

    <section class="index">

        <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-12">

                    <div home info>
                        <h2>Discover quick and simple recipes for everyday use, entertaining and 
                            alluring recipes for the weekend, and spectacular recipes for the events and get-togethers you cherish most.
                        </h2>

                        <div class="search-coainer">
                        <input type="search" class="search-input form-control" id="searchInput" placeholder="Search recipes..." aria-label="Search" oninput="performSearch()">
                        
                        </div>                        
                    </div>

                </div>
            </div>
            

        </div>
            
    </section>

    <div class="search-results mt-2" id="searchResults">
    </div>

    <section class="recipe">

        <div class="container">
   
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Popular Recipe</h2>
                </div>
            </div>
        </div>

        <div class="recipe-container">
            <div class="row">
                <?php $count = 0; ?>
                <?php foreach ($recipes as $recipe): ?>
                    <?php if ($count % 3 == 0 && $count != 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="#" class="recipe-card-link" data-toggle="modal" data-target="#recipeModal" onclick="showRecipeDetails(<?php echo $recipe['recipe_id']; ?>)">
                            <div class="recipe-card" style="width: 25rem;" data-recipe-id="<?php echo $recipe['recipe_id']; ?>">
                                <img class="recipe-image" src="uploads/<?php echo $recipe['file_Name']; ?>" alt="<?php echo $recipe['recipe_name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $recipe['recipe_name']; ?></h5>
                                    <p class="card-text">Category: <?php echo $recipe['category']; ?></p>
                                    <p class="card-text">Location: <?php echo $recipe['cuisine']; ?></p>
                                    <p class="card-text">Duration: <?php echo $recipe['duration']; ?></p>
                                    <a href="#" class="card-link">See more</a>
                                </div>
                            </div>
                        </a>

                    </div>
                    <?php $count++; ?>
                    <?php if ($count % 3 == 0): ?>
                        </div> <div class="row"> 
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($count % 3 != 0): ?>
                </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="back-to-top-container">
            <div class="back-to-top-button">
                <a href="chefprofile.php" class="btn btn-primary">Create your own Recipe Now</a>
            </div>
        </div>

    </section>

    <section class="cta">
        <div class="wrap clearfix">
			<h2>Join over 10 million people creating on Chef's Corner.</h2>
            <a href="#" class="btn btn-primary">Add your </a>
		</div>
    </section>



    <script src="js/app.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <script src="js/recipedata.js"></script>	
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
    </div>



</body>
</html>
<footer>
    <div>
        <p>&copy; 2024 Chef's Corner. All rights reserved.</p>
    </div>
</footer>