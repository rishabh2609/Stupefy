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
    xmlhttp.open("GET","php/livesearch.php?q="+str,true);
    xmlhttp.send();
  }
    
} 
function change_val_bar(obj) {
  document.getElementById('search_bar').value = obj.innerHTML;
  showCollections(obj.innerHTML);
  document.getElementById("livesearch").innerHTML = "";
  document.getElementById("livesearch").style.boxShadow = "none";
}