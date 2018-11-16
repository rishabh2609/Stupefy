var timer;

function touch_3d(obj) {
	timer = setTimeout(function() {
      obj.className = "touch3d";
    	obj.childNodes[1].className = "touch3d-content";
      console.dir(obj);
    	obj.childNodes[3].style.textAlign = 'center';
      obj.childNodes[5].style.textAlign = 'center';
    	if(window.innerHeight < 700) {
    		obj.childNodes[3].style.fontSize = '28px';
    	}
    	else {
    		obj.childNodes[3].style.fontSize = '50px';
        obj.childNodes[5].style.fontSize = '28px';
    	}

    	obj.childNodes[9].style.display = 'initial';
  	}, 500);	
}
function clear_timer() {
	if (timer) {
    	clearTimeout(timer);
  	}	
}
function close_touch_3d(obj) {
	obj.parentNode.className = "collection-view";
	obj.parentNode.childNodes[1].className = "img-responsive img-thumbnail";
	obj.parentNode.childNodes[3].style.textAlign = 'initial';

  obj.parentNode.childNodes[5].style.textAlign = 'initial';
   	obj.parentNode.childNodes[3].style.fontSize = '24px';
    obj.parentNode.childNodes[5].style.fontSize = '24px';
   	obj.style.display = 'none';
}