$('#file').change( function(event) {
	var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#preview").attr('src',tmppath);
    $("#btn-upload").removeClass("hidden");      
    $('html, body').animate({
        scrollTop: $("#preview").offset().top
    }, 800);
});

