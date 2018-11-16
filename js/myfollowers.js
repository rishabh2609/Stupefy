function showFollowers() {
  var uname = $('#username_cont').val();
  
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("followers_container").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","php/followers_return.php?q="+uname,true);
  xmlhttp.send();
}

function follow_person(obj) {
  if(obj.innerHTML == "Follow") {
    obj.className = "btn btn-primary";
    obj.innerHTML = "Following";
    obj.parentNode.childNodes[3].innerHTML = obj.parentNode.childNodes[3].innerHTML * 1 + 1; 
  
    var uname = obj.parentNode.childNodes[5].childNodes[1].innerHTML;
    console.log(uname);
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
        }
    };
    xmlhttp.open("GET","php/add_follower.php?q="+uname,true);
    xmlhttp.send();
  }
}