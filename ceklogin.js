function validasiFormKosong() {
 var x = document.forms["LoginForm"]["EmailOrUsername"].value;
 var y = document.forms["LoginForm"]["Password"].value;
 if (x == null || x == "" || y == null || y == "") {
  alert("Form harus diisi");
  return false;
 }
}