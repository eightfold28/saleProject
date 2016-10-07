function validasiFormKosong() {
	var a = document.forms["addproduct"]["item_name"].value;
	var b = document.forms["addproduct"]["item_desc"].value;
	var c = document.forms["addproduct"]["item_price"].value;
	var d = document.forms["addproduct"]["item_image"].value;
	if (a == null, a == "" || b == null, b == "" || c == null, c == "" || d == null, d == "") {
		alert("Form harus diisi");
		return false;
	}
}
