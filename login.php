<?php

$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnicki račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		provjera($username,$password);
	}
}


function provjera($username, $password) {
	

	$xml=simplexml_load_file("users.xml");
	
	
	foreach ($xml->user as $usr) {
  	 	$usrn = $usr->username;
		$usrp = $usr->password;
		$usrime=$usr->ime;
		$usrprezime=$usr->prezime;
		if($usrn==$username){
			if($usrp == $password){
				echo "Prijavljeni ste kao $usrime $usrprezime";
				return;
				}
			else{
				echo "Netočna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	return;
}
?>

<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css"/>
    <meta name="author" content="Dominik Kušt"/>
    <link rel="stylesheet" type="text/css" href="style2.css"/>
    <title>Login</title>
</head>

<body>

	<section class="sekcija1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Dobrodošli</h2>
                    <p class="crta">________</p>
                    <p>Za nastavak prvo se prijavite</p>
                </div>
            </div>
        </div>
    </section>
		
	<section class="sekcija2">
		<div class="container">
			<form action="" method="post">
				<table>
					<tr>
						<td>
							<label>Korisnički račun :</label>
						</td>
						<td>
							<input id="name" name="username" type="text">
						<td>
					</tr>

					<tr>
						<td>
							<label>Lozinka :</label>
						</td>
						<td>
							<input id="password" name="password" placeholder="**********" type="password">
						<td>
					</tr>

					<tr>
						<td>
							<input name="submit" type="submit" value=" Login ">
						</td>
						<td>
					</tr>
				</table>
			</form>
		</div>
	</section>
</body>
</html>
