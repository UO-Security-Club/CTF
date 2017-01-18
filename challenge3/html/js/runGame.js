var encrypted = "U2FsdGVkX19AGvb4C5Bmcg/hDqxzubYWjevLskqZtMoUgqSYPzy9yq6AzZQAfMTg";

var decrypted = CryptoJS.AES.decrypt(encrypted, "UOSEC_UgotTHEflag");
var flag = decrypted.toString(CryptoJS.enc.Utf8);

var OGalert = alert;
alert = function() {
	var win = "Congrats! The Flag is: ";
	win += flag;
	return OGalert(win);
}
