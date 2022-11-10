 /* Set the width of the side navigation to 250px */
 function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("mySidenav").style.height = "100%";

 }

 /* Set the width of the side navigation to 0 */
 function closeNav() {
     document.getElementById("mySidenav").style.height = "0";
     document.getElementById("mySidenav").style.width = "0";
 }

 // Log out alert
 function verifyLogout(){
     alert("You have logged out...");
 }

 function openDashboard(){
    window.open('userHome.php', '_self');
 }