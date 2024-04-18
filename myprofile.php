<?php 
require_once('session.php');
// To check if the user is logged in
checkLoggedIn();

if ($_SESSION['role'] !== 'seeker') {
    echo "<script>alert('Unauthorized')</script>";
    echo "<script>window.location.href = 'logout.php'</script>";
    exit(); // Make sure to stop script execution after redirecting
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#suggestModal">Suggest New Recipe</a><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Update Profile</a>
            </div>
        </div>
    </div>

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

    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <h2>My Recipes</h2>
                    <table id="recipeList" class="table table-bordered table-striped">
                        <tbody>
                            <?php include('chefoffice.php'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <script src="js/chefdata.js"></script>
    <script src="js/main.js"></script>	
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