<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kontakt</title>
<link rel="stylesheet" type="text/css" href="stil.css">
<SCRIPT src="validacija.js"></SCRIPT>
</head>
<body>
<div id="okvir">
<div id="zaglavlje">
<div class="wrapper">
     <div class="circle">
         <span id="text">GBS</span>
     </div>
 </div>
<h1>Gradska biblioteka Sarajevo</h1></div>
<div id="meni">
<ul>
<li><a href="index.php">Novosti</a></li>
<li><a href="podaci.php">Podaci </a></li>
<li><a href="link.php">Linkovi</a></li>
<li><a href="kontakt.php">Kontakt</a></li>
</ul>
</div>
<div class="form">
<br>
<br>
<br>
<br>
<br>
<br>
<form name="input" action="http://zamger.etf.unsa.ba">
<fieldset>
<legend>Unesite sljedeće podatke</legend>
<p><label > Ime i prezime: </label><input onchange = "validirajIme()" type="text" name="imeprezime"></p>
<p><label > E-mail adresa: </label><input type="email" name="email"></p>
<p><label > Broj telefona: </label><input  type="tel" name="brojtelefona"></p>
<p><label> Broj članske karte:</label><input  type="number" name="brojclanske" min="1" max="9999"></p>
<p><label> Polje za komentar:</label><textarea name="komentar">Unesite komentar</textarea></p>
<input type="reset" value=Odustani class="dugme">
<input type="submit" value=Potvrdi class="dugme">
</fieldset>
</form></div>
<br>
<br>
<br>
<br>
<br>
<br>
<div id="podnozje">
<p>Copyright (c) 2016. Elmaza Kurtanović</p>
</div>
</div>
</BODY>
</HTML>