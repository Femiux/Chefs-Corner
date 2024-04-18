<?php 
require_once('session.php');
// To check if the user is logged in
checkLoggedIn();

if ($_SESSION['role'] !== 'chef') {
    echo "<script>alert('Unauthorized')</script>";
    echo "<script>window.location.href = 'cheflogin.php'</script>";
    exit(); 
}
include('header.php');
include('profileupdate.php');

?>

<title>My Recipes</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/chefdata.js"></script>  
<script src="js/test.js" ></script>

<body>
    

    <div class="container">

        <div class="container">
            <div class="row">
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
    </div>

    
    <div class="container">

        <div class="container">
            <div class="row">
                <div class="modal fade" id="userModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username Name:</label>
                                            <input id="username" type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control"
                                                placeholder="Please enter username  *" required="required"
                                                data-error="Username name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                </div>


                        
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fullname">Full Name:</label>
                                                <input id="fullname" type="text" name="fullname" value="<?php echo $user['fullname']; ?>" class="form-control"
                                                    placeholder="Please enter your name *" required="required"
                                                    data-error="Full name is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email</label>
                                            <input id="form_email" type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control"
                                            placeholder="Enter email Address *" required="required"
                                            data-error="Location name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Location</label>
                                            <input id="form_email" type="tesxt" name="location" value="<?php echo $user['location']; ?>" class="form-control"
                                            placeholder="Where are you located *" required="required"
                                            data-error="Location name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                    
                                </div>




                                <div class="row">
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file">Upload Profile Picture:</label>
                                            <input type="file" id="profile_pic" name="profile_pic" class="form-control"
                                                placeholder="Upload profile picture*" required="required"
                                                data-error="A file is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="submit" name="update_profile" class="btn btn-success btn-send" value="Update Profile">
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

    <div class="user-profile col-md-12">
        <div class="profile-picture col-md-4">
            <img src="profile/<?php echo $user['profile_pic']; ?>" alt="">
        </div>
        <div class="profile-details col-md-8">
            <h2>My Profile</h2>
            <div class="container">
                <h3 class="fullname">Full Name: <?php echo $user['fullname']; ?></h3>
                <p class="username">User Name: <?php echo $user['username']; ?></p>
                <p class="email">Email: <?php echo $user['email']; ?></p>
                <p class="location">Location: <?php echo $user['location']; ?></p>
            </div>
            <div class="buttons mt-4">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Recipe</a><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Update Profile</a>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>My Recipes</h2>
                <div class="recipe-container" id="recipeContainer">
                    <div class="row">
                        <?php 
                        if (!empty($results)) {
                            $count = 0;
                            foreach ($results as $result) {
                                if ($count % 3 == 0 && $count != 0) {
                                    echo '</div><div class="row">';
                                }
                                $count++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php include('chefoffice.php'); ?>
            </div>
        </div>
    </div>





    


    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <script src="js/chefdata.js"></script>
    <script src="js/main.js"></script>	
    <script src="js/recipedata.js"></script>
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