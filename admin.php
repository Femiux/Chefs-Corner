<?php 
include('header.php');
session_start();


?>
<title>My Recipes</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/chefdata.js"></script>  
<script src="js/test.js" ></script>

<body>
    <section class="navbar navbar-fixed-top" role="navigation">
    
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
    
            <!-- lOGO TEXT HERE -->

            <img id="logo" src="images\foodlogo.png" alt="RGU FOOD BANK" />
            <a href="index.html" class="navbar-brand">CHEF CORNER</a>
        </div>
    
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About Us</a></li>
                <li><a href="#help" class="smoothScroll">Get Involved</a></li>
                <li><a href="#team" class="smoothScroll">Partners</a></li>
                <li><a href="#join" class="smoothScroll">Contact Us</a></li>
            </ul>
    
            <nav class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav">
                <nav class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                        // Check if the user is logged in
                        if (isset($_SESSION['username'])) {
                            // If logged in, display the username and logout link
                            echo '<li><a href="#">Welcome, ' . $_SESSION['username'] . '</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                        } else {
                            // If not logged in, display the "Become a Chef" and "Sign In" buttons
                            echo '<li><a href="#join" class="highlighted-btn">Become a Chef</a></li>';
                            echo '<li><a href="#team" class="filled-btn">Sign In</a></li>';
                        }
                        ?>
                    </ul>
                </nav>

                </ul>
            </nav>
        </nav>
    </section>

    

    <div class="container contact">  
            
        <div class="container">
            <div class="row">
                <div class="recipe-container">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Recipe</a>
                </div>
                <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Recipe</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" method="post" action="addRecipe.php" role="form" enctype="multipart/form-data">
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Recipe Tittle*</label>
                                            <input id="form_name" type="text" name="recipe_name" class="form-control"
                                                placeholder="Give your Recipe a name *" required="required"
                                                data-error="Recipe name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Location</label>
                                                <select name="cuisine" required="required" class="form-control" >
                                                    <option value="European Cuisine">European Cuisine</option>
                                                    <option value="African Cuisine">African Cuisine</option>
                                                    <option value="Asian Cuisine">Asian Cuisine</option>
                                                    <option value="Pakistan Cuisine">Pakistan Cuisine</option>                                            
                                                    <option value="Italian Cuisine">Italian Cuisine</option>
                                                    <option value="Mexican Cuisine">Mexican Cuisine</option>
                                                    <option value="Australian Cuisine">Australian Cuisine</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
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
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file">Upload Image/Video:</label>
                                            <input type="file" id="file" name="file" class="form-control"
                                                placeholder="Please upload image/video for recipe*" required="required"
                                                data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Category</label>
                                                <select name="category" required="required" class="form-control">
                                                    <option value="Breakfast">Breakfast</option>
                                                    <option value="Lunch">Lunch</option>
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Appetizers & Snacks">Appetizers & Snacks</option>
                                                    <option value="Desserts">Desserts</option>
                                                    <option value="Beverages">Beverages</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Ingredients *</label>
                                            <textarea name="ingredients" class="form-control" placeholder="e.g 250g flour, 100ml water,"
                                                rows="4" required="required" data-error="Please, list ingredients."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Duration</label>
                                                <select name="duration" required="required" class="form-control"> 
                                                    <option value="10 min">10 min</option>
                                                    <option value="20 min">20 min</option>
                                                    <option value="30 min">30 min</option>
                                                    <option value="40 min">40 min</option>
                                                    <option value="50 min">50 min</option>
                                                    <option value="60 min">60 min</option>
                                                    <option value="70 min">70 min</option>
                                                    <option value="80 min">80 min</option>
                                                    <option value="90 min">90 min</option>
                                                    <option value="100 min">100 min</option>
                                                    <option value="110 min">110 min</option>
                                                    <option value="120 min">120 min</option>

                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Steps *</label>
                                            <textarea name="steps" class="form-control" placeholder="e.g Mix the flour and water until they thicken"
                                                rows="4" required="required" data-error="Type steps line by line."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Recipes</h2>
                    <table id="recipeList" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Chef</th>
                                <th>Recipe</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Ingredients</th>
                                <th>Location</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include('adminoffice.php'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

 




    


    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <script src="js/chefdata.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js'></script>
</body>
</html>
<footer>
    <div>
        <p>&copy; 2024 Chef's Corner. All rights reserved.</p>
    </div>
</footer>