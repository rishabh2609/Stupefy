var modal = document.getElementById('myModal');

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
function openmodal(obj){
    modal.style.display = "block";
    modalImg.src = obj.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.boxShadow = "none";
    return;
  }
  else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } 
    else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.boxShadow = "0px 4px 4px 0px rgb(210, 210, 210)";
      }
    }
    xmlhttp.open("GET","php/livesearch_for_users.php?q="+str,true);
    xmlhttp.send();
  }
    
} 