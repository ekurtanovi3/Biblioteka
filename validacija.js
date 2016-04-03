function validirajIme() {
    var x = document.forms["input"]["imeprezime"];
   var regexIme = /^[a-zA-Z]*\s*[a-zA-Z]*$/;
   if(regexIme.test(x.value) == false)
	{
			x.style.backgroundColor = "red";
			return false;
		}
		else x.style.backgroundColor = "white";
}
