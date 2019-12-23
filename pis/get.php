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

			require('config.php');	

			$sql = mysqli_query($connect, "SELECT * FROM imenik") or die ("Error kod SELECTA");
			$json_array = array();
				
			while($row = mysqli_fetch_assoc($sql) ) {
				$json_array[] = $row;
			}
			
			$myfile = fopen("json_tekst.txt", "w") or die("Unable to open file!");
			$txt = json_encode($json_array);
			fwrite($myfile, $txt);
			fclose($myfile);
				
		?>

		<?php

			$curl_handle = curl_init();
			$url = "localhost/ipiss/json_tekst.txt";
			 
			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);

			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle);
			 
			curl_close($curl_handle);

			// Decode JSON into PHP array
			$user_data = json_decode($curl_data);
			
			
			echo "<h2> Svi telefonski zapisi </h2>";
			echo "<div class='cisti'>";
			echo "<table style='border: 1px solid black;'>";
				echo "<tr>";
					echo "<td>Ime</td>";
					echo "<td>Mobilni</td>";
					echo "<td>Fiksni</td>";
					echo "<td>Poslovni</td>";
				echo "</tr>";
			
			foreach ($user_data as $user) {
				
				echo "<tr>";
					echo "<td> " .$user->ime . "</td>";
					echo "<td> " .$user->mobilni . "</td>";
					echo "<td> " .$user->fiksni . "</td>";
					echo "<td> " .$user->poslovni . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
				
			echo "<br><h2> Traženi zapisi </h2>";
			echo "<div class='cisti'>";
			if (isset($_POST["trazi"] )){
			
				$podString = $_POST['pretraga'];
				
				echo "<table style='border: 1px solid black;'>";
				echo "<tr>";
					echo "<td>Ime</td>";
					echo "<td>Mobilni</td>";
					echo "<td>Fiksni</td>";
					echo "<td>Poslovni</td>";
				echo "</tr>";
				
				if(!empty($podString)){
					foreach ($user_data as $user) {
						if(strpos($user->ime, $podString)!== false || 
							strpos($user->mobilni, $podString)!== false || 
							strpos($user->fiksni, $podString)!== false || 
							strpos($user->poslovni, $podString)!== false ) {
							echo "<tr>";
								echo "<td> " .$user->ime . "</td>";
								echo "<td> " .$user->mobilni . "</td>";
								echo "<td> " .$user->fiksni . "</td>";
								echo "<td> " .$user->poslovni . "</td>";
							echo "</tr>";
						}
					}
					echo "</table>";
				}
			}
		?>

		<div class="cisti">
		<br><br>
		<h3> Pretraži telefonski imenik </h3>

		<form action="" method="post">

			<table>
				<tr>
					<td> Unesite ime ili telefonski broj: </td> 
					<td> <input type="text" name="pretraga"> </td>
				</tr>
				<tr>
					<td> <br> </td> 
					<td> <br> </td>
				</tr>
				<tr>
					<td> <input type="submit" name="trazi" value="Pretraži"> </td>
				</tr>
			</table>
			
		</form>
		<br><br><br>
		<p><a href="post.php"> Dodaj novi zapis u imeniku </a></p>
		<br>
		<p><a href="delete.php"> Izbriši zapis iz imenika </a></p>
		<br><br>
		<h3><a href="index.php"> Povratak početnu stranicu </a></h3>

	</div>
	
</body>
</html> 

