function openNav() {
  var screenWidth = window.innerWidth;
  if(screenWidth <= 450)
  {document.getElementById("mySidenav").style.width = "100%";}
  else{
    document.getElementById("mySidenav").style.width = "400px";
  }
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }