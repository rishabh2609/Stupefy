var timer;

function touch_3d(obj) {
	timer = setTimeout(function() {
      obj.className = "touch3d";
    	obj.childNodes[1].className = "touch3d-content";
    	obj.childNodes[3].style.textAlign = 'center';
      obj.childNodes[5].style.textAlign = 'center';
    	if(window.innerHeight < 700) {
    		obj.childNodes[3].style.fontSize = '28px';
    	}
    	else {
    		obj.childNodes[3].style.fontSize = '50px';
        obj.childNodes[5].style.fontSize = '28px';
    	}

    	obj.childNodes[7].style.display = 'initial';
  	}, 500);	
}
function clear_timer() {
	if (timer) {
    	clearTimeout(timer);
  	}	
}
function close_touch_3d(obj) {
	obj.parentNode.className = "collection-view";
	obj.parentNode.childNodes[1].className = "img-responsive";
	obj.parentNode.childNodes[3].style.textAlign = 'initial';

  obj.parentNode.childNodes[5].style.textAlign = 'initial';
   	obj.parentNode.childNodes[3].style.fontSize = '24px';
    obj.parentNode.childNodes[5].style.fontSize = '24px';
   	obj.style.display = 'none';
}

function showCollections(str) {
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("all-collections").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","php/collections_return.php?q="+str,true);
  xmlhttp.send();
}

function stupefy(obj) {
  
  if(obj.style.color != "blue") 
  {
    
    str = obj.parentNode.childNodes[11].value;
    document.getElementById('stup_count_' + str).innerHTML = (document.getElementById('stup_count_' + str).innerHTML * 1) + 1;
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
    xmlhttp.open("GET","php/stupefy_inc_photo.php?q="+str,true);
    xmlhttp.send();  
  }
  obj.style.color = 'blue';
}


