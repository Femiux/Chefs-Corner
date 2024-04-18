<?php 
session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login </title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/Login.css">
        <link rel="stylesheet" href="css\mystyle.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <li href='hps://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="navbar navbar-fixed-top" role="navigation">
    
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
            
                <a href="index.html" class="navbar-brand">CHEF CORNER</a>
            </div>
        
            </nav>
        </section>

        <section class="form-container">

            <div class="image-container">
                <img src="images\IMG_4248-1024x940.jpg" alt="Signup Image">
            </div>

            <div class="form">
                <div class="form-content">
                    <h2>Login as a Chef</h2>    
                        <div class="tab-pane" id="tab12" role="tabpanel">
                            <div class="tab-pane-item">
                                <form action="loginbk.php" method="post">

                                    <div class="mb-3">
                                        <label for="InputEmail1" class="form-label"></label>
                                        <input type="email" name="email" placeholder="Enter Email Address"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword1" class="form-label"></label>
                                        <input type="password" name="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                                        <i class='bx bx-hide eye-icon'></i>
                                    </div>
                                    <br>
                                    
                                    <div class="field button-field">
                                        <button type="submit" name="register">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form-link">
                                <span>Don't have an account? <a href="chefsignup.php">Sign-Up</a></span>
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