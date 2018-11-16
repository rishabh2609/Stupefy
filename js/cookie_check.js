function cookie_check() {
	if(navigator.cookieEnabled == false) {
		window.location.assign("cookie.php");
	}
}