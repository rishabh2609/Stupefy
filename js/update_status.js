function update_status() {
    var str = document.getElementById("status").value;

    if(str == "") {
        document.getElementById("status_update").innerHTML = "Status cannot be NULL!";
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("status_update").innerHTML = this.responseText;
                var timer = setTimeout(function() {
                    document.getElementById("status_update").innerHTML = "";
                }, 2500);
                if(this.responseText != "") {
                    $("#btn-signup").addClass("hidden");
                }
                else {
                    $("#btn-signup").removeClass("hidden");  
                }
            }
        };
        
        xmlhttp.open("GET", "php/status_update.php?q=" + str, true);
        xmlhttp.send();
    }
}

$('#file').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#profile_pic_preview").attr('src',tmppath);
});