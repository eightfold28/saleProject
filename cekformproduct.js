function validasiFormKosongadd() {
	var a = document.forms["addproduct"]["item_name"].value;
	var b = document.forms["addproduct"]["item_desc"].value;
	var c = document.forms["addproduct"]["item_price"].value;
	var d = document.forms["addproduct"]["item_image"].value;
	if (a == null || a == "" || b == null || b == "" || c == null || c == "" || d == null || d == "") {
		alert("Form harus diisi semua.");
		return false;
	} else return true;
}

function validasiFormKosongedit() {
	var a = document.forms["addproduct"]["item_name"].value;
	var b = document.forms["addproduct"]["item_desc"].value;
	var c = document.forms["addproduct"]["item_price"].value;
	if (a == null || a == "" || b == null || b == "" || c == null || c == "") {
		alert("Form harus diisi semua.");
		return false;
	} else return true;
}
function validasiDescLength() {
	var desc = document.forms["addproduct"]["item_desc"].value;
	if (desc) {
		if (desc.length > 200) {
			alert("Deskripsi harus kurang dari 200 karakter.");
			return false;
		} else return true;
	} else return false;
}

function validasiPrice(id) {
	if (document.getElementById(id).value) {
		if (/^\d+$/.test(document.getElementById(id).value)) {
			return true;
		} else {
			alert("Harga harus dalam integer.");
			return false;
		}
	} else return false;
}

function validasi() {
	var desc = validasiDescLength(), kosong = validasiFormKosongadd(), price = validasiPrice("item_price");
    if (desc===true) {
    	if (kosong == true) {
    		if (price == true) {
    			return true;
    		} else return false;
    	}else return false;
    } else return false;
}

function validasiedit() {
	var desc = validasiDescLength(), kosong = validasiFormKosongedit(), price = validasiPrice("item_price");
    if (desc===true) {
    	if (kosong == true) {
    		if (price == true) {
    			return true;
    		} else return false;
    	}else return false;
    } else return false;
}

