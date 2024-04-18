<?php 
?>
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
    <body>
    <section class="navbar navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand">CHEF CORNER</a>
        </div>
        <nav class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php" class="smoothScroll">Home</a></li>
                <li><a href="about.php" class="smoothScroll">About Us</a></li>
                <li><a href="faq.php" class="smoothScroll">FAQ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Breakfast</a></li>
                        <li><a href="#">Lunch</a></li>
                        <li><a href="#">Vegetarian</a></li>
                        <li><a href="#">Appetizers & Snacks</a></li>
                        <li><a href="#">Desserts</a></li>
                        <li><a href="#">Beverages</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Location <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">European Cuisine</a></li>
                        <li><a href="#">African Cuisine</a></li>
                        <li><a href="#">Asian Cuisine</a></li>
                        <li><a href="#">Pakistan Cuisine</a></li>
                        <li><a href="#">Italian Cuisine</a></li>
                        <li><a href="#">Mexican Cuisine</a></li>
                        <li><a href="#">Australian Cuisine</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    // Check if user is logged in
                    if (isset($_SESSION['username'])) {
                        // Check user role
                        switch ($_SESSION['role']) {
                            case 'admin':
                                echo '<a href="hq.php">Welcome, ' . $_SESSION['username'] . '</a>';
                                break;
                            case 'chef':
                                echo '<a href="chefprofile.php">Welcome, ' . $_SESSION['username'] . '</a>';
                                break;
                            case 'seeker':
                                echo '<a href="myprofile.php">Welcome, ' . $_SESSION['username'] . '</a>';
                                break;
                        }
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        // If not logged in
                        echo '<a href="#join" class="highlighted-btn">Become a Chef</a>';
                        echo '<a href="#team" class="filled-btn">Sign In</a>';
                    }
                    ?>
                </li>

            </ul>
        </nav>
    </section>
</head>