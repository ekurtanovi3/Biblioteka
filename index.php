<?php
   session_start();
?>
<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Novosti</title>
  <link rel="stylesheet" type="text/css" href="stil.css">
  <SCRIPT src="datum.js"></SCRIPT>
 </head>
 <body>
 
 
 
 <?php    
    $msg = '';
    $Err='';
         
		 
	if (isset($_POST['addnewsbutton'])){
        if (!isset($_POST["headline"] )) {
            $Err= " Headline is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else if (!isset($_POST["content"] ) || $_POST["content"]=="") {
            $Err =" content is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $headline=strip_tags($_POST["headline"]);
			$content=strip_tags($_POST["content"]);
			$otvoreno = 0;
			if(isset($_POST['otvoreno']))
				$otvoreno=1;
            $headline = htmlEntities($headline, ENT_QUOTES);
		    $content = htmlEntities($content, ENT_QUOTES); 
            if(!empty($headline) && !empty($content) && $content!=""){
                $idLogovanog = $_SESSION['id'];
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            $rezultat = $veza->exec("INSERT INTO novosti SET naslov = '$headline',otvoren = '$otvoreno', tekst = '$content', vrijeme= NOW(), idAutora = '$idLogovanog'");
			}
        }
    } 
	
    if (isset($_POST['adduserbutton'])){
        if (!isset($_POST['usernameA'] )) {
            $Err= " Username is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else if (!isset($_POST['passwordA'] )) {
            $Err =" Password is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $usernameA=$_POST['usernameA'];
			$passwordA = htmlEntities($_POST['passwordA'], ENT_QUOTES);
	        $hash = hash('md5', $passwordA, false);
            $usernameA = htmlEntities($usernameA, ENT_QUOTES);
		    
            if(!empty($usernameA) && !empty($hash)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select username, password from autori");
	if(!$rezultat)
	{
		$greska = $veza->errorInfo();
		print "SQL greska: " . $greska[2];
		exit();
	}
	
	$postoji = false;
	foreach($rezultat as $korisnik)
	{
		if($korisnik['username'] == $usernameA)
			$postoji = true;
	}
	
	if(!$postoji){
	$rezultat2 = $veza->exec("INSERT INTO autori SET username = '$usernameA', password = '$hash'");
	if(!$rezultat2)
	{
		$greska = $veza->errorInfo();
		print "SQL greska: " . $greska[2];
		exit();
	}
	}
	      
			}
        }
    }
	if (isset($_POST['deleteuserbutton'])){
        if (!isset($_POST['usernameA'] )) {
            $Err= " Username is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $usernameA=$_POST['usernameA'];
            $usernameA = htmlEntities($usernameA, ENT_QUOTES);
		    
            if(!empty($usernameA)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from autori where username='$usernameA'");
			}
        }
    }
	if (isset($_POST['edituserbutton'])){
        if (!isset($_POST['usernameA'] )) {
            $Err= " Username is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $usernameA=$_POST['usernameA'];
			$pass="";
            $usernameA = htmlEntities($usernameA, ENT_QUOTES);
			$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select id, username, password from autori where username = '$usernameA'");
			$postoji = false;
	        foreach($rezultat as $korisnik)
	        {
		        if($korisnik['username'] == $usernameA) {
			    $postoji = true;
				//$pass=$korisnik['password'];
				}
	        }
			if($postoji) {
			
			if(isset($_POST['noviusernameA'] ) && $_POST['novipasswordA']=='') {
				$noviusernameA=$_POST['noviusernameA'];
				$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("update autori set username = '$noviusernameA' where username = '$usernameA'");
			}
		    
          else if(isset($_POST['novipasswordA'] ) && $_POST['novipasswordA']!='' && $_POST['noviusernameA']=='') {
				$novipasswordA=$_POST['novipasswordA'];
				$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$hash = hash('md5',$novipasswordA,false);
				$rezultat = $veza->query("update autori set password = '$hash' where username = '$usernameA'");
			}
		else if(isset($_POST['noviusernameA']) && ($_POST['novipasswordA'] != '')&& ($_POST['noviusernameA'] != '')) {
				$noviusernameA=$_POST['noviusernameA'];
				$novipasswordA=$_POST['novipasswordA'];
				$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$hash = hash('md5',$novipasswordA,false);
				$rezultat = $veza->query("update autori set password = '$hash' where username = '$usernameA'");
				$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("update autori set username = '$noviusernameA' where username = '$usernameA'");
			}
			}
			
        }
    }
	if (isset($_POST['deletenewsbutton'])){
        if (!isset($_POST['idN'] )) {
            $Err= " ID is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $id=$_POST['idN'];
            $id = htmlEntities($id, ENT_QUOTES);
		    
            if(!empty($id)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from novosti where id='$id'");
			}
        }
    }
	if (isset($_POST['changepasswordbutton'])){
		$user=$_SESSION['username'];
        if (!isset($_POST['novipasswordA'] )) {
            $Err= " Password is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $pass=$_POST['novipasswordA'];
            $pass = htmlEntities($pass, ENT_QUOTES);
			$hash = hash('md5',$_POST['novipasswordA'],false);
		    
            if(!empty($hash)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("update autori set password='$hash' where username='$user'");
			}
        }
    }
	if (isset($_POST['allowcommentbutton'])){
		$otvoren=0;
        if (!isset($_POST['idN'] )) {
            $Err= " ID is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $id=$_POST['idN'];
            $id = htmlEntities($id, ENT_QUOTES);
		    
            if(!empty($id)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select otvoren from novosti where id='$id'");
				foreach($rezultat as $r) {
					$otvoren=$r['otvoren'];
				}
				if($otvoren == 0) {
					$rezultat = $veza->query("update novosti set otvoren='1' where id='$id'");
					$msg= "Novost je sada otvorena za komentare";
                       echo "<script type='text/javascript'>alert('$msg');</script>";
				}
				else {
					$rezultat = $veza->query("update novosti set otvoren='0' where id='$id'");
					$msg= "Novost je sada zatvprena za komentare";
                       echo "<script type='text/javascript'>alert('$msg');</script>";
				}
			}
        }
    }
	if (isset($_POST['deletecommentbutton'])){
        if (!isset($_POST['idC'] )) {
            $Err= " ID is required";
            echo "<script type='text/javascript'>alert('$Err');</script>";
        } 
        else{
            $id=$_POST['idC'];
            $id = htmlEntities($id, ENT_QUOTES);
		    
            if(!empty($id)){
			    $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
                $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$veza->exec("set names utf8");
				$rezultat = $veza->query("delete from komentari where id='$id'");
				
			}
        }
    }
	if(isset($_POST['logoutbutton'])) {
        $_SESSION['loggedIn']=false;
		session_unset();
        header('Location: index.php');
    }
    else if (isset($_POST['loginbutton']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username= $_POST['username'];
        $passwordHash = hash('md5',$_POST['password'],false);
		$veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
        $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $veza->exec("set names utf8");
		$rezultat = $veza->query("select id, username, password from autori");
        $dobarUsername=false;
        $dobarPassword=false;
	    $korisnik="";
	    $i="";
	    foreach($rezultat as $row) {
		    $u=$row['username'];
		    $p=$row['password'];
			if(($u == $username) && $p == $passwordHash) {
			    $dobarUsername=true;
				$dobarPassword=true;
				$korisnik=$u;
				$_SESSION['id'] = $row['id'];
			}
        } 
        if (isset($dobarUsername) && isset($dobarPassword) && $dobarUsername==true && $dobarPassword==true) {
			$_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $korisnik;
            $_SESSION['loggedIn'] = $korisnik;
            $loggedIn=true;
		}
	    else{
            $message = 'You have entered invalid username or password';
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
       	
?>

	
	
  <div id="okvir">
   <div id="zaglavlje">
   <div class="wrapper">
     <div class="circle">
         <span id="text">GBS</span>
     </div>
 </div>
    <h1>Gradska biblioteka Sarajevo</h1>
	
	</div>
    
   <div id="meni">
    <ul>
     <li><a href="index.php">Novosti </a></li>
	 <li><a href="podaci.php">Podaci </a></li>
	 <li><a href="link.php">Linkovi </a></li>
	 <li><a href="kontakt.php">Kontakt </a></li>
    </ul>
   </div>
  
  <div id="novosti">
    <?php
        $veza = new PDO("mysql:dbname=biblioteka_baza;host=localhost;charset=utf8", "root", "");
        $veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['komentarNovost']) && $_GET['komentarNovost']!= '' ) {
	        $tekst = $_GET['komentarNovost'];
	        $novost = $_GET['idNovosti'];
	        $rezultat = $veza->exec("INSERT INTO komentari SET tekst = '$tekst', vrijeme = NOW(), idNovosti = '$novost'");
		}
        else $rezultat = $veza->query("select id, naslov, tekst, vrijeme, idAutora, otvoren from novosti");

        if(isset($_GET['komentarKomentar']) && $_GET['komentarKomentar'] != '') {
	        $tekst = $_GET['komentarKomentar'];
	        $novost = $_GET['idNovosti'];
	        $komentar = $_GET['idKomentara'];
	        $rezultatkom = $veza->exec("INSERT INTO komentari SET tekst = '$tekst', vrijeme = NOW(), komentarKomentara = '$komentar', idNovosti = '$novost'");
		}
        else $rezultat = $veza->query("select id, naslov, tekst, vrijeme, idAutora, otvoren from novosti");
		
        $brojNovosti = 0;
        foreach($rezultat as $novost) {	
	        $id = $novost['id'];
	        $idAutora = $novost['idAutora'];
	        $usernameAutor = "";
	        if(isset($_SESSION['idAutor']) && $_SESSION['idAutor'] != -1) {
		        if($_SESSION['idAutor'] != $idAutora) continue;
	        }
	        if(isset($_GET['autor']) && $_GET['autor'] != $idAutora) {
		        continue;
			}
	        $rezultat4 = $veza->query("select username from autori where id = '$idAutora'");
	        foreach($rezultat4 as $usernameAutora) {
		        $usernameAutor = $usernameAutora['username'];
			}
	        $otvorena = $novost['otvoren'];
		    print "<div class=\"okvir2\">";
		    print "<div class=\"novost1\">".$novost['naslov']."</div>";
		    print "<div class=\"tekstnovosti\">".$novost['tekst']. "<br><br>";
 		    print "<p class=\"datum\"></p><div class=\"vrijemeobjave\">".$novost['vrijeme']. "</div><br><br>";
		    print "<a href='index.php?vijest=$id'>Detaljnije...</a></div>";
            print " </div>";
  
            if(isset($_GET['vijest']) || isset($_GET['komentarNovost']) || isset($_GET['komentarKomentar'])) {
		        if(isset($_GET['vijest'])) $ID = $_GET['vijest'];
		        if(isset($_GET['komentarNovost'])) $ID = $_GET['idNovosti'];
		        if(isset($_GET['komentarKomentar'])) $ID = $_GET['idNovosti'];
		        if($ID == $id) {
			        print "<a class=\"autor\" href='index.php?autor=$idAutora'> Autor novosti je korisnik: ".$usernameAutor."</a>";
				}
		        if($otvorena == 1 && $ID == $id) {
			        print "<form action=\"index.php?komentarNovost\" method=\"GET\">
							<input class=\"comment\" type=\"text\" name=\"komentarNovost\" placeholder=\"Ostavite komentar...\"><BR>
							<input type=\"hidden\" name=\"idNovosti\" value=$id>
					</form>";
		        }
				$rezultat2 = $veza->query("select id, tekst, vrijeme, komentarKomentara, idNovosti from komentari order by vrijeme asc");
		        foreach($rezultat2 as $komentarr) {
			        $idKomentara = $komentarr['id'];
			        if($komentarr['komentarKomentara'] == null && $komentarr['idNovosti'] == $id && $ID == $id) {
				        print "<h4>".$komentarr['tekst']."</h4>";
				        if($otvorena == 1) {
					        print "<form action=\"index.php?komentarKomentar\" method=\"GET\">
									<input class=\"comment\" type=\"text\" name=\"komentarKomentar\" placeholder=\"Ostavite komentar...\"><BR>
									<input type=\"hidden\" name=\"idNovosti\" value=$id>
									<input type=\"hidden\" name=\"idKomentara\" value=$idKomentara>
							</form>";
				        }
				        $rezultat3 = $veza->query("select id, tekst, vrijeme, komentarKomentara, idNovosti from komentari order by vrijeme asc");
				        foreach($rezultat3 as $komentar) {
					        if($komentar['komentarKomentara'] == $idKomentara && $komentar['idNovosti'] == $id) {
						        print "<h5>".$komentar['tekst']."</h5>";
							}
						}
					}
				}
			}
		}
    ?>
  </div>
  
   
   <div id="lijevi">
   

        

                

        <div class="addnews">
        <?php
        if(!isset($_SESSION['loggedIn'])){
            print("
            <form class='loginforma' method='post'>
            <p class='username'>
            <label for'username'>Username:</label>
            <input name='username' type=text class='username' placeholder='' id='headlinearea' required/>
            </p>
            <p class='password'>
            <label for='password'>Password:</label>
            <input name='password' type=password class='password' placeholder='' id='headlinearea' required/>
            </p>
             <input type='submit' value='Login' id='loginbutton' name='loginbutton' />
            <br><br>
        
          </form>");
        }
        else{
            print(" <form class='logoutforma' method='post'>
            <input type='submit' value='Logout' id='logoutbutton' name='logoutbutton' /> <br><br></form>       <p class='headline'>
                      <form method='post'>
                      <label for='headline'>Naslov:</label>
                        <input name='headline' type=text class='news' placeholder='' id='headlinearea'/>
                    </p>

                    <p class='content'>
                        <label for='content'>Tekst:
                            <br>
                        </label>
                        <textarea id='contentarea' name='content' rows='4'> </textarea>
						
                    </p>
					<p class='comment'>
					<label for='comment'>Dozvoljeno komentarisanje:
					<br>
					</label>
					<input type='checkbox' name='otvoreno' value='otvoreno'/>
					<br>
					
                    
                    <input type='submit' onclick='addElement();' name='addnewsbutton' value='Dodaj novost' id='addnewsbutton' /> 
                    <br> <br><br>");
					if($_SESSION['username'] == 'admin') {
						print(" 
						<label for='idN'>ID novosti:</label>
                        <input name='idN' type=text class='' placeholder='' id='idN'/>
                    </p>
                    <input type='submit' onclick='addElement();' name='deletenewsbutton' value='Izbriši novost' id='deletenewsbutton' />
                    <br>
					<label for='idN'>ID komentara:</label>
                        <input name='idC' type=text class='' placeholder='' id='idC'/>
                    </p>
                    <input type='submit' onclick='addElement();' name='deletecommentbutton' value='Izbriši komentar' id='deletecommentbutton' />	
                    <br>
                    	<input type='submit' onclick='addElement();' name='allowcommentbutton' value='Dozvoli/zabrani komentare za novost' id='allowcommentbutton' />				
                    <br> <br>"
                  
            );
					}
                  
                    print("</form><br><br>"
            );
		
			if($_SESSION['username'] == 'admin') {
				print(" <p class='usernameA'>
                      <form method='post'>
                      <label for='usernameA'>Username:</label>
                        <input name='usernameA' type=text class='username' placeholder='' id='usernameAarea'/>
                    </p>
					
					<label for='passwordA'>Password:</label>
                        <input name='passwordA' type=password class='password' placeholder='' id='passwordAarea'/>
                    </p>

                    
					<br>
					
                    
                    <input type='submit'  onclick='addElement();' name='adduserbutton' value='Dodaj korisnika' id='adduserbutton' />
                    <br><br><br>
                    <input type='submit' onclick='addElement();' name='deleteuserbutton' value='Izbriši korisnika' id='deleteuserbutton' />
                    <br>
					<label for='noviusernameA'>Novi username:</label>
                        <input name='noviusernameA' type=text class='username' placeholder='' id='noviusernameAarea'/>
                    </p>
					
					<label for='novipasswordA'>Novi password:</label>
                        <input name='novipasswordA' type=password class='password' placeholder='' id='novipasswordAarea'/>
                    </p>
                    <input type='submit' onclick='addElement();' name='edituserbutton' value='Ažuriraj korisnika' id='edituserbutton' />					
                    <br> <br>
                  
                    </form><br><br>"
            );
        }
		else {
			print("
			<p class='usernameA'>
                      <form method='post'>
			
					<label for='novipasswordA'>Novi password:</label>
                        <input name='novipasswordA' type=password class='password' placeholder='' id='novipasswordAarea'/>
                    </p>
					<input type='submit' onclick='addElement();' name='changepasswordbutton' value='Promjena passworda' id='changepasswordbutton' />
					<br></form><br><br>
					");
		}
		}
        ?>

                    
   
   <div class="Pretraga">
		<select id="izbornik" onchange="prikazi()">
			<option value="sve">Sve novosti</option>
			<option value="danasnje">Današnje novosti</option>
			<option value="sedmicne">Novosti ove sedmice</option>
			<option value="mjesecne">Novosti ovog mjeseca</option>
		</select>
	</div>
   <br><br>
	
	
	</div>
   </div>
  
   <div id="podnozje">
    <p>Copyright (c) 2016. Elmaza Kurtanović</p>
   </div>
  </div>
 </body>
</html>