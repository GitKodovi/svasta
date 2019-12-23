<!DOCTYPE html>
<html>
<head>
	<title>Telefonski imenik</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="izgled.css">

</head>
<body>
		
	<br><br>
	<div class="okvir">

		<?php

			if (isset($_POST["forma"]) ){

				$idBris = $_POST["idBrisanja"];
				$data = array('idBr' => $idBris);

				$string = http_build_query($data);

				$ch = curl_init();
				$url = "localhost/ipiss/baza.php";

				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


				$response  = curl_exec($ch);

				curl_close($ch);
				print_r ($response);

			}

		?>

		<h2> Obrišite zapis </h2>

		<br>

		<form action="" method="post">

			<table>
			
				<tr>
					<td> Unesite ime ili telefonski broj: </td> 
					<td> <input type="text" name="idBrisanja"> </td>
				</tr>
				

				<tr>
					<td> <br> </td> 
					<td> <br> </td>
				</tr>
				
				<tr>
					<td> <input type="submit" name="forma" value="Submit"> </td>
				</tr>
			</table>
			
		</form>

		<br><br><br>
		<p><a href="post.php"> Dodaj novi zapis u imeniku </a></p>
		<br>
		<p><a href="get.php"> Pregled zapisa u imeniku </a></p>
		<br><br>
		<h3><a href="index.php"> Povratak početnu stranicu </a></h3>


	</div>
	
</body>
</html> 



