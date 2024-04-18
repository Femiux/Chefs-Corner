function openTab(evt, tabName) {
    var i, tabcontent, navLinks;
    
    // Hide all tab contents and remove 'active' class from nav links
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    navLinks = document.querySelectorAll(".nav-sidebar a");
    for (i = 0; i < navLinks.length; i++) {
        navLinks[i].className = navLinks[i].className.replace("active", "");
    }
    
    // Show the specific tab content and set 'active' class to the clicked nav link
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
