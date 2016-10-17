function calculate(price)
{
	var qty = document.getElementById("qty").value;
	var result =  price * qty;
	
	document.getElementById("total").value = result;
}

function cekDigit(id) {
	console.log("tes1");
	if (document.getElementById(id).value) {
		if (/^\d+$/.test(document.getElementById(id).value)) {
			console.log("tes2");
			return true;
		} else {
			console.log("tes3");
			return false;
		}
	}
}

function cekDigitCC() {
	if ((document.getElementById("credit_card").value) != null && (document.getElementById("credit_card").value) != "") {
		if (cekDigit("credit_card")) {
			if (document.getElementById("credit_card").value.length != 12) {
				alert("Credit card harus 12 digit");
	        	return false;
			} else return true;
		} else {
			alert("Credit card harus 12 digit");
			return false;
		}
	} else {
		alert("Credit card harus 12 digit");
		return false;
	}
}

function cekDigitCVV() {
	if ((document.getElementById("card_verification").value) != null && (document.getElementById("card_verification").value) != "") {
		if (cekDigit("card_verification")) {
			if (document.getElementById("card_verification").value.length != 3) {
				alert("CVV harus 3 digit");
	        	return false;
			} else return true;
		} else {
			alert("CVV harus 3 digit");
			return false;
		}
	} else {
		alert("CVV harus 3 digit");
		return false;
	}
}

function konfirmasi() {
	return confirm('Apakah data yang anda masukkan benar?');
}

function validasi() {
	var cred= cekDigitCC(), cvv= cekDigitCVV();
    if ((cred==true) && (cvv===true)) {
    	var conf = konfirmasi()
    	if (conf===true) {
        	return true;
        } else return false;
    } else return false;
}

