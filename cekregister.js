function validasiFormKosong() {
    var x = document.forms["registerForm"]["fullname"].value;
    var y = document.forms["registerForm"]["username"].value;
    var z = document.forms["registerForm"]["email"].value;
    var a = document.forms["registerForm"]["password"].value;
    var b = document.forms["registerForm"]["confirmpassword"].value;
    var c = document.forms["registerForm"]["fulladdress"].value;
    var d = document.forms["registerForm"]["postalcode"].value;
    var e = document.forms["registerForm"]["phonenumber"].value;
    if (x == null || x == "" || y == null || y == "" || z == null || z == "" || 
        a == null || a == "" || b == null || b == "" || c == null || c == "" ||
        d == null || d == "" || e == null || e == "") {
        alert("Form harus diisi semua");
        return false;
    } else return true;
}

function validasiEmail() { 
    var email = document.forms["registerForm"]["email"].value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(registerForm.email.value)) { 
        return true;
    } else {
        alert("Format email anda salah!");
        return false;
    }
}

function validasiPassword() {
    var password = document.forms["registerForm"]["password"].value;
    var confirmPassword = document.forms["registerForm"]["confirmpassword"].value;
    if (password != confirmPassword || password == null || password == "" || confirmPassword == null || confirmPassword == "") {
        alert("Passwords do not match.");
        return false;
    } else return true;
}

function validasi() {
    var pass = validasiPassword(), form = validasiFormKosong(), email = validasiEmail();
    if ((pass==true) && (form==true) && (email==true)) {
        return true;
    } else return false;
}