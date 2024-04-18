<?php 
include('header.php');

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mystyle.css">

    <!-- Scripts -->
    <script>
    function openTab(tabName) {
      var i, tabContent;
      tabContent = document.getElementsByClassName("tab-content");
      for (i = 0; i < tabContent.length; i++) {
          tabContent[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
    }
    </script>
  </head>

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
              <li><a href="#" class="smoothScroll">Home</a></li>
              <li><a href="#" class="smoothScroll">About Us</a></li>
              <li><a href="#" class="smoothScroll">FAQ</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Breakfast</a></li>
                      <li><a href="#">Lunch</a></li>
                      <li><a href="#">Vegetarian</a></li>
                      <li><a href="#">Appetizers & Snacks</a></li>
                      <li><a href="#">Desserts</a></li>
                      <li><a href="#">Beverages</a></li>
                      <!-- Add more categories as needed -->
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
                      <!-- Add more locations as needed -->
                  </ul>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <?php
                  // to check
                  if (isset($_SESSION['username'])) {
                      // If logged in, 
                      echo '<a href="#">Welcome, ' . $_SESSION['username'] . '</a>';
                      echo '<li><a href="logout.php">Logout</a></li>';
                  } else {
                      // If not logged in,
                      echo '<a href="#join" class="highlighted-btn">Become a Chef</a>';
                      echo '<a href="#team" class="filled-btn">Sign In</a>';
                  }
                  ?>
              </li>
          </ul>
      </nav>
    </section>

    <div class="grid-container">
      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
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
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">category</span> Recipes
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">group</span> Users
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">group</span> Chefs
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">RECIPES</p>
              <span class="material-icons-outlined text-blue">category</span>
            </div>
            <span class="text-primary font-weight-bold">249</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">USERS</p>
              <span class="material-icons-outlined text-orange">group</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">CHEFS</p>
              <span class="material-icons-outlined text-green">group</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">FAVORITE RECIPE</p>
              <span class="material-icons-outlined text-red">category</span>
            </div>
            <span class="text-primary font-weight-bold">56</span>
          </div>


        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Top 5 Recipes</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Recipes by Location</p>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

   
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>