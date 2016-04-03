window.onload = function() {
	vrijemeObjave();
}

function vrijemeObjave() {
	var trenutni = new Date();
	var novosti = document.getElementsByClassName('okvir2');
	//var datum = trenutni - 4244;
	//var razlika = trenutni - datum;
	for(var i = 0; i < novosti.length; i++) {
		if (i == 0)  {
			var datum = trenutni - 5 * 1000;
			novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 1) {
			var datum = trenutni - 6 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 2) {
			var datum = trenutni - 7 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 3) {
			var datum = trenutni - 2 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 4) {
			var datum = trenutni - 5 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 5) {
			var datum = trenutni - 12 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 6) {
			var datum = trenutni - 21 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 7) {
			var datum = trenutni - 25 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 8) {
			var datum = trenutni - 33 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 9) {
			var datum = trenutni - 42 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
		if (i == 10) {
			var datum = trenutni - 49 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
		}
	if (i == 11) {
			var datum = trenutni - 51 * 24 * 60 * 60 * 1000;
				novosti[i].getElementsByClassName('datum')[0].innerHTML = new Date(datum);
	}
	    var razlika = trenutni - datum;
		if(razlika < 60 * 1000)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije par sekundi";
		if (razlika >= 60 * 1000 && razlika < 60 * 60 * 1000) {
			if( Math.round(pretvoriUMinute(razlika)) == 1 || Math.round(pretvoriUMinute(razlika)) == 21 || Math.round(pretvoriUMinute(razlika)) == 31 || 
			Math.round(pretvoriUMinute(razlika)) == 41 || Math.round(pretvoriUMinute(razlika)) == 51)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUMinute(razlika)) + " minut.";
			else if( Math.round(pretvoriUMinute(razlika)) == 2 || Math.round(pretvoriUMinute(razlika)) == 3 || Math.round(pretvoriUMinute(razlika)) == 4 || 
			Math.round(pretvoriUMinute(razlika)) == 22 || Math.round(pretvoriUMinute(razlika)) == 23 || Math.round(pretvoriUMinute(razlika)) == 24 || 
			Math.round(pretvoriUMinute(razlika)) == 32 || Math.round(pretvoriUMinute(razlika)) == 33 || Math.round(pretvoriUMinute(razlika)) == 34 || 
			Math.round(pretvoriUMinute(razlika)) == 42 || Math.round(pretvoriUMinute(razlika)) == 43 || Math.round(pretvoriUMinute(razlika)) == 44 || 
			Math.round(pretvoriUMinute(razlika)) == 52 || Math.round(pretvoriUMinute(razlika)) == 53 || Math.round(pretvoriUMinute(razlika)) == 54)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUMinute(razlika)) + " minute.";
			else 
				novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUMinute(razlika)) + " minuta.";
		}
		if (razlika >= 60 *60 * 1000 && razlika < 24 * 60 * 60 * 1000) {
			if( Math.round(pretvoriUSate(razlika)) == 1 || Math.round(pretvoriUSate(razlika)) == 21)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUSate(razlika)) + " sat.";
			else if( Math.round(pretvoriUSate(razlika)) == 2 || Math.round(pretvoriUSate(razlika)) == 3 || Math.round(pretvoriUSate(razlika)) == 4 || 
			Math.round(pretvoriUSate(razlika)) == 22 || Math.round(pretvoriUSate(razlika)) == 23)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUSate(razlika)) + " sata.";
			else 
				novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUSate(razlika)) + " sati.";
		}
		if (razlika >= 24 * 60 *60 * 1000 && razlika < 7 * 24 * 60 * 60 * 1000) {
			if( Math.round(pretvoriUDane(razlika)) == 1)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUDane(razlika)) + " dan.";
			else 
				novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUDane(razlika)) + " dana.";
		}
		if (razlika >= 7 * 24 * 60 *60 * 1000 && razlika <= 4 * 7 * 24 * 60 * 60 * 1000) {
			if( Math.round(pretvoriUSedmice(razlika)) == 1)
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUSedmice(razlika)) + " sedmicu.";
			else 
				novosti[i].getElementsByClassName('prikaz')[0].innerHTML = "Novost objavljena prije " + Math.round(pretvoriUSedmice(razlika)) + " sedmice.";
		}
		var x = new Date(datum);
		var mjesec = x.getMonth();
		mjesec++;
		if (razlika > 4 * 7 * 24 * 60 * 60 * 1000) {
			novosti[i].getElementsByClassName('prikaz')[0].innerHTML ="Novost objavljena " + x.getDate()+"."+mjesec +"."+x.getFullYear()+".";
		}
			
	}
}

function pretvoriUMinute(brojMilisekundi) {
	brojMilisekundi = brojMilisekundi / 1000;
	brojMilisekundi = brojMilisekundi / 60;
	return brojMilisekundi;
}

function pretvoriUSate(brojMilisekundi) {
	brojMilisekundi = pretvoriUMinute(brojMilisekundi);
	brojMilisekundi /= 60;
	return brojMilisekundi;
}

function pretvoriUDane(brojMilisekundi) {
	brojMilisekundi = pretvoriUSate(brojMilisekundi);
	brojMilisekundi /= 24;
	return brojMilisekundi;
}

function pretvoriUSedmice(brojMilisekundi) {
	brojMilisekundi = pretvoriUDane(brojMilisekundi);
	brojMilisekundi /= 7;
	return brojMilisekundi;
}

function prikazi() {
	var trenutni = new Date();
    var x = document.getElementById("izbornik").value; 
    var novosti = document.getElementsByClassName("okvir2");
   
	if ( x == "danasnje")
	{
		for (var i = novosti.length - 1; i >= 0; i--) {
			var dan = new Date(novosti[i].getElementsByClassName('datum')[0].innerHTML).getDate();
			var mjesec = new Date(novosti[i].getElementsByClassName('datum')[0].innerHTML).getMonth();
			var godina = new Date(novosti[i].getElementsByClassName('datum')[0].innerHTML).getFullYear();
			if(mjesec == trenutni.getMonth() && godina == trenutni.getFullYear() && dan == trenutni.getDate()) novosti[i].style.display = 'block';
			else novosti[i].style.display = 'none';
		}
	}
	
	if ( x == "sedmicne")
	{
	}
	
	if ( x == "mjesecne")
	{
		for (var i = novosti.length - 1; i >= 0; i--) {
			var mjesec = new Date(novosti[i].getElementsByClassName('datum')[0].innerHTML).getMonth();
			var godina = new Date(novosti[i].getElementsByClassName('datum')[0].innerHTML).getFullYear();
			if(mjesec == trenutni.getMonth() && godina == trenutni.getFullYear()) novosti[i].style.display = 'block';
			else novosti[i].style.display = 'none';
		}
	}
	
	if( x == "sve")
	{
			for (var i = novosti.length - 1; i >= 0; i--) {
			novosti[i].style.display = 'block';
		}

	}
}
