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


		if (isset($_POST["forma"] )){ 

			$ime = $_POST["ime"];
			$telefon = $_POST["telefon"];
			$vrsta = $_POST["vrsta"];
			$data = array('name' => $ime, 'tel' => $telefon, 'vrsta' => $vrsta);



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

		<h2> Dodajte novi zapis u imenik </h2>

		<br>

		<form action="" method="post">

			<table>
				<tr>
					<td> Ime: </td> 
					<td> <input type="text" name="ime"> </td>
				</tr>
				<tr>
					<td> Broj telefona: </td>
					<td> <input type="text" name="telefon"> </td>
				</tr>
				
				<tr>
					<td> Vrsta telefona: </td>
					<td>
						<select name="vrsta">
							<option value="mobilni">Mobilni</option>
							<option value="poslovni">Poslovni</option>
							<option value="fiksni">Fiksni</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td> <br> </td> 
					<td> <br> </td>
				</tr>
				
				<tr>
					<td> <input type="submit" name="forma" value="Dodaj zapis"> </td>
				</tr>
			</table>
			
			
		</form>
	
		<br><br><br>
		<p><a href="get.php"> Pregled zapisa u imeniku </a></p>
		<br>
		<p><a href="delete.php"> Izbriši zapis iz imenika </a></p>
		<br><br>
		<h3><a href="index.php"> Povratak početnu stranicu </a></h3>

	</div>
	
</body>
</html> 
