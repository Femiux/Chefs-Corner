<?php 
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/Login.css">
        <link rel="stylesheet" href="css\mystyle.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="navbar navbar-fixed-top" role="navigation">
    
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
        
                <!-- lOGO TEXT HERE -->

                <a href="index.php" class="navbar-brand">CHEF CORNER</a>
            </div>
        
            <nav class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" class="smoothScroll">Home</a></li>
                    <!--<li><a href="#about" class="smoothScroll">About Us</a></li>
                    <li><a href="#help" class="smoothScroll">Get Involved</a></li>
                    <li><a href="#team" class="smoothScroll">Partners</a></li>
                    <li><a href="#join" class="smoothScroll">Contact Us</a></li>-->
                </ul>
        
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
                            echo '<li><a href="cheflogin.php" class="highlighted-btn">Become a Chef</a></li>';
                            echo '<li><a href="login.php" class="filled-btn">Sign In</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </nav>
        </section>

        <section class="form-container">

            <div class="image-container">
                <img src="images\IMG_4248-1024x940.jpg" alt="Signup Image">
            </div>

            <div class="form"> 
                <div class="form-content">
                    <h2>Sign-Up as a</h2>
        
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab11" aria-controls="tab11" role="tab" data-toggle="tab">Recipe Seeker</a></li>
                        <li><a href="#tab12" aria-controls="tab12" role="tab" data-toggle="tab">Chef</a></li>
                    </ul>
        
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab11" role="tabpanel">
                            <div class="tab-pane-item">
                                <form action="signupbk.php" method="post">

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
                                          <option value="seeker">Recipe Seeker</option>
                                        </select>
                                    </div>
                              
                                    <div class="field button-field">
                                        <button type="submit" name="register">Signup</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form-link">
                                <span>Already have an account? <a href="login.php">Login</a></span>
                            </div>
                        </div>
        
                        <div class="tab-pane" id="tab12" role="tabpanel">
                            <div class="tab-pane-item">
                            <form action="signupbk.php" method="post">

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
                            </form>
                            </div>
                            <div class="form-link">
                                <span>Already have an account? <a href="login.php">Login</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    

        <!-- JavaScript -->
        <script src="js/test.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>

        
    </body>
</html>
<footer>
    <div>
        <p>&copy; 2024 Chef's Corner. All rights reserved.</p>
    </div>
</footer>