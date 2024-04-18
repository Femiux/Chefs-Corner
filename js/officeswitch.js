function openTab(tabName) {
    var i, tabContent;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none"; // Hide all tab content initially
    }
    
    // Remove the 'active' class from all tab links
    var tabLinks = document.getElementsByClassName("tab-link");
    for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove('active');
    }
    
    // Add the 'active' class to the clicked tab link
    document.getElementById(tabName + '-tab').classList.add('active');
    
    // Display the tab content corresponding to the clicked tab
    document.getElementById(tabName).style.display = "block";
}



