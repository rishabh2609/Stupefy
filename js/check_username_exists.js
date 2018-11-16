function check(str) {
    if (str.length == 0) { 
        document.getElementById("uname_err").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("uname_err").innerHTML = this.responseText;
                if(this.responseText != "") {
                    $("#btn-signup").addClass("hidden");
                }
                else {
                    $("#btn-signup").removeClass("hidden");  
                }
            }
        };
        xmlhttp.open("GET", "php/check_user.php?q=" + str, true);
        xmlhttp.send();
    }
}
function check_pass() {
    if(document.getElementById("con-pass").value != document.getElementById("pass").value) {
        document.getElementById("pass_err").innerHTML = "Passwords do not match";
        $("#btn-signup").addClass("hidden");
    }
    else {
        document.getElementById("pass_err").innerHTML = "";
        $("#btn-signup").removeClass("hidden");   
    }
}