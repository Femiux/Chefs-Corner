<?php 
require_once('session.php');
// To check if the user is logged in
checkLoggedIn();

if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Unauthorized')</script>";
    echo "<script>window.location.href = 'logout.php'</script>";
    exit(); 
}
include('header.php');
include('admincount.php');
include('profileupdate.php');



?>

<head>
    <title>My Recipes</title>
    <script src="js/officeswitch.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css\officestyle.css">
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>






    <div class="grid-container">


      <!-- Header -->
        <div class="header col-md-12">

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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addadminModal">Add New Admin</a><br>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Update Profile</a>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span> CHEF's Corner Admin Dashboard </span> 
                </div>
            <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item" id="dashboard-tab" onclick="openTab('dashboard')">
                    <a href="#" id="dashboard-tab" onclick="openTab('dashboard')">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item" id="recipes-tab" onclick="openTab('recipes')">
                    <a href="#" id="recipes-tab" onclick="openTab('recipes')">
                    <span class="material-icons-outlined">category</span> Recipes
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" id="users-tab" onclick="openTab('users')">
                    <span class="material-icons-outlined">group</span> Users
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" id="chefs-tab" onclick="openTab('chefs')">
                    <span class="material-icons-outlined">group</span> Chefs
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" id="settings-tab" onclick="openTab('settings')">
                    <span class="material-icons-outlined">settings</span> Settings
                    </a>
                </li>
            </ul>
        </aside>


        <main class="main">
            <div id="dashboard" class="tab-content-active">
                <div class="main-cards">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">RECIPES</p>
                            <span class="material-icons-outlined text-blue">category</span>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $recipe_count; ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">RECIPE SEEKER</p>
                            <span class="material-icons-outlined text-orange">group</span>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $seeker_count; ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">CHEFS</p>
                            <span class="material-icons-outlined text-green">group</span>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $chef_count; ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">ADMINS</p>
                            <span class="material-icons-outlined text-red">group</span>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $admin_count; ?></span>
                    </div>
                </div>

            </div>
            
            

            <div id="recipes" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">All Recipes <?php echo $recipe_count; ?></h2>
                        <div class="profile-buttons">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Recipe</a>
                        </div>
                        <table id="recipeList" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Chef</th>
                                    <th>Recipe</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include ('adminoffice.php'); ?>
                            </tbody>
                        </table>
                    </div>
            
            
                </div>
            </div>

            <div id="users" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">All Recipe Seeker</h2>
                        <div class="profile-buttons">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addadminSeeker">Add New Seeker</a>
                        </div>
                        <table id="recipeList" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                            </tr>";
                            </thead>
                            <tbody>
                                <?php include ('seekeradmin.php'); ?>
                            </tbody>
                        </table>
                    </div>
            
            
                </div>
            </div>

            <div id="chefs" class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">All Chefs</h2>
                        <div class="profile-buttons">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addadminChef">Add New Chef</a>
                        </div>
                        <table id="recipeList" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Location</th>
                            <th>Num of Recipe</th>
                            <th>Action</th>
                            </tr>";
                            </thead>
                            <tbody>
                                <?php include ('chefadmin.php'); ?>
                            </tbody>
                        </table>
                    </div>
            
            
                </div>
            </div>
            





        </main> 
    </div>

    <div class="container"> 
    <div class="row">
        <div class="container mt-4">
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

       

    

        <div class="container">
            <div class="row">
                <div class="modal fade" id="addadminModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add a New Admin</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" action="adminsignupbk.php" method="post">
                            <div class=row>
                            <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="fullname" placeholder="Enter your fullname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>                                  
                                    <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="username" placeholder="Create a username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputEmail1" class="form-label"></label>
                                        <input type="email" name="email" placeholder="Enter Email Address"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword1" class="form-label"></label>
                                        <input type="password" name="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword2" class="form-label"></label>
                                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <br>
                                    <div>                              
                                        <select name="role" required>
                                          <option value="admin">Admin</option>
                                        </select>
                                    </div>
                              
                                    <div class="field button-field">
                                        <button type="submit" name="register">Signup</button>
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
                <div class="modal fade" id="addadminSeeker" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add a New Seeker</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" action="signupbk.php" method="post">
                            <div class=row>
                            <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="fullname" placeholder="Enter your fullname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>                                  
                                    <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="username" placeholder="Create a username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputEmail1" class="form-label"></label>
                                        <input type="email" name="email" placeholder="Enter Email Address"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword1" class="form-label"></label>
                                        <input type="password" name="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword2" class="form-label"></label>
                                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <br>
                                    <div>                              
                                        <select name="role" required>
                                          <option value="seeker">Seeker</option>
                                        </select>
                                    </div>
                              
                                    <div class="field button-field">
                                        <button type="submit" name="register">Signup</button>
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
                <div class="modal fade" id="addadminChef" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <!-- modal header  -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add a New Chef</h4>
                    </div>
                    <div class="modal-body">
                        <!-- begin modal body content  -->
                        <form id="contact-form" action="signupbk.php" method="post">
                            <div class=row>
                            <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="fullname" placeholder="Enter your fullname"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>                                  
                                    <div class="mb-3">
                                        <label for="InputName" class="form-label"></label>
                                        <input type="text" name="username" placeholder="Create a username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputEmail1" class="form-label"></label>
                                        <input type="email" name="email" placeholder="Enter Email Address"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword1" class="form-label"></label>
                                        <input type="password" name="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword2" class="form-label"></label>
                                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <br>
                                    <div>                              
                                        <select name="role" required>
                                          <option value="chef">Chef</option>
                                        </select>
                                    </div>
                              
                                    <div class="field button-field">
                                        <button type="submit" name="register">Signup</button>
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



        <div class="modal fade" id="editRecipeModal" tabindex="-1" aria-labelledby="editRecipeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRecipeModalLabel">Edit Recipe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <? include('edit_recipe.php'); ?>
                        <form id="edit-recipe-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <input type="hidden" name="recipe_id" value="<?php echo isset($editRecipeData['recipe_id']) ? $editRecipeData['recipe_id'] : ''; ?>">

                            <!-- Recipe Title -->
                            <div class="form-group">
                                <label for="edit_recipe_name">Recipe Title</label>
                                <input id="edit_recipe_name" type="text" name="recipe_name" class="form-control" value="<?php echo isset($editRecipeData['recipe_name']) ? $editRecipeData['recipe_name'] : ''; ?>" required>
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <label for="edit_category">Category</label>
                                <select id="edit_category" name="category" class="form-control" required>
                                    <!-- Include categories dynamically -->
                                    <?php
                                    $categories = array(
                                        'Breakfast',
                                        'Lunch',
                                        'Vegetarian',
                                        'Appetizers & Snacks',
                                        'Desserts',
                                        'Beverages'
                                    );
                                    foreach ($categories as $cat) {
                                        $selected = (isset($editRecipeData['category']) && $cat == $editRecipeData['category']) ? 'selected' : '';
                                        echo '<option value="' . $cat . '" ' . $selected . '>' . $cat . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Duration -->
                            <div class="form-group">
                                <label for="edit_duration">Duration</label>
                                <select id="edit_duration" name="duration" class="form-control" required>
                                    <!-- Include durations dynamically -->
                                    <?php
                                    $durations = array(
                                        '10 min', '20 min', '30 min', '40 min', '50 min', '60 min',
                                        '70 min', '80 min', '90 min', '100 min', '110 min', '120 min'
                                    );
                                    foreach ($durations as $dur) {
                                        $selected = (isset($editRecipeData['duration']) && $dur == $editRecipeData['duration']) ? 'selected' : '';
                                        echo '<option value="' . $dur . '" ' . $selected . '>' . $dur . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Cuisine -->
                            <div class="form-group">
                                <label for="edit_cuisine">Cuisine</label>
                                <select id="edit_cuisine" name="cuisine" class="form-control" required>
                                    <!-- Include cuisines dynamically -->
                                    <?php
                                    $cuisines = array(
                                        'European Cuisine',
                                        'African Cuisine',
                                        'Asian Cuisine',
                                        'Pakistan Cuisine',
                                        'Italian Cuisine',
                                        'Mexican Cuisine',
                                        'Australian Cuisine'
                                    );
                                    foreach ($cuisines as $cui) {
                                        $selected = (isset($editRecipeData['cuisine']) && $cui == $editRecipeData['cuisine']) ? 'selected' : '';
                                        echo '<option value="' . $cui . '" ' . $selected . '>' . $cui . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Ingredients -->
                            <div class="form-group">
                                <label for="edit_ingredients">Ingredients</label>
                                <textarea id="edit_ingredients" name="ingredients" class="form-control" rows="4" required><?php echo isset($editRecipeData['ingredients']) ? $editRecipeData['ingredients'] : ''; ?></textarea>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="edit_description">Description</label>
                                <textarea id="edit_description" name="description" class="form-control" rows="4" required><?php echo isset($editRecipeData['description']) ? $editRecipeData['description'] : ''; ?></textarea>
                            </div>

                            <!-- Steps -->
                            <div class="form-group">
                                <label for="edit_steps">Steps</label>
                                <textarea id="edit_steps" name="steps" class="form-control" rows="4" required><?php echo isset($editRecipeData['steps']) ? $editRecipeData['steps'] : ''; ?></textarea>
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label for="edit_file">Upload Image/Video:</label>
                                <input type="file" id="edit_file" name="file" class="form-control" required>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_recipe" class="btn btn-primary">Update Recipe</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <script>
            // Function to fetch recipe details and populate the form
            function loadRecipeDetails(recipeId) {
                fetch(`fetch_recipe_details.php?id=${recipeId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('edit_recipe_name').value = data.recipe_name || '';
                        document.getElementById('edit_category').value = data.category || '';
                        document.getElementById('edit_duration').value = data.duration || '';
                        document.getElementById('edit_cuisine').value = data.cuisine || '';
                        document.getElementById('edit_ingredients').value = data.ingredients || '';
                        document.getElementById('edit_description').value = data.description || '';
                        document.getElementById('edit_steps').value = data.steps || '';
                        // Handle file input separately if needed
                    }
                })
                .catch(error => {
                    console.error('Error fetching recipe details:', error);
                });
            }

            // Call the function with the desired recipe ID
            const recipeId = /* Get the recipe ID from the URL or other source */;
            loadRecipeDetails(recipeId);

        </script>

                   

 




    

        <script>
            function deleteRecipe(recipeId) {
                if (confirm('Are you sure you want to delete this recipe?')) {
                    window.location.href = 'delete_recipe.php?id=' + recipeId;
                }
            }
        </script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>

</body>
</html>
