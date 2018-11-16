window.addEventListener('load', function() {
	var uname = $('#username_disp').html();
	var xmlhttp;
	if (window.XMLHttpRequest) {
    	xmlhttp = new XMLHttpRequest();
	} 
	else {
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			if(this.responseText == 'true') {
				$('#btn-follow').addClass('btn-primary');
				$('#btn-follow').removeClass('btn-default');
				$('#btn-follow').html('Following');
			}
			else {
				$('#btn-follow').removeClass('btn-primary');
				$('#btn-follow').addClass('btn-default');
				$('btn-follw').html('Follow');
			}
		}
	};

	xmlhttp.open("GET", "php/already_following.php?q=" + uname, true);
	xmlhttp.send();
});

$('#btn-follow').click(function() {
	if($('#btn-follow').html() == 'Follow') {
		var uname = $('#username_disp').html();
		var xmlhttp;
		if (window.XMLHttpRequest) {
	    	xmlhttp = new XMLHttpRequest();
		} 
		else {
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {
			$('#btn-follow').addClass('btn-primary');
			$('#btn-follow').removeClass('btn-default');
			$('#btn-follow').html('Following');
		};

		xmlhttp.open("GET", "php/add_follower.php?q=" + uname, true);
		xmlhttp.send();

		$('#no_follow_container').html($('#no_follow_container').html() * 1 + 1);
	}
});

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