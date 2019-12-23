<?php

	require('config.php');	
					
	if (isset($_POST["name"] )){ 
		$ime = $_POST['name'];
	}
	
	if (isset($_POST["vrsta"] )){ 
		$vrsta = $_POST['vrsta'];
	}
	
	if (isset($_POST["tel"] )){ 
		$telefon = $_POST['tel'];
	}
	
	//----------------------------------------------------------------------------------------------------------------------------------------------
	
	
	if (isset($_POST["idBr"] )){ 
		$idBrisanja = $_POST['idBr'];
	}
	
	//----------------------------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST["vrsta"] )){ 
		if ($vrsta == 'mobilni') {
			$sql = "INSERT INTO imenik (ime, mobilni, vrsta) VALUES ('$ime','$telefon','$vrsta')";
			$result = mysqli_query($connect, $sql);
			if($result)
				echo "Podaci su uspješno zapisani u bazu (mobilni)";
			else
				echo "Greška kod mobilnog telefona";
		}
		
		if ($vrsta == 'fiksni') {
			$sql = "INSERT INTO imenik (ime, fiksni, vrsta) VALUES ('$ime','$telefon','$vrsta')";
			$result = mysqli_query($connect, $sql);
			if($result)
				echo "Podaci su uspješno zapisani u bazu (fiksni)";
			else
				echo "Greška kod fiksnog telefona";
		}
		
		if ($vrsta == 'poslovni') {
			$sql = "INSERT INTO imenik (ime, poslovni, vrsta) VALUES ('$ime','$telefon','$vrsta')";
			$result = mysqli_query($connect, $sql);
			if($result)
				echo "Podaci su uspješno zapisani u bazu (poslovni)";
			else
				echo "Greška kod poslovnog telefona";
		}
	}
	
	//----------------------------------------------------------------------------------------------------------------------------------------------
	
	if (isset($_POST["idBr"] )){ 
		$brisiSQL = "DELETE FROM imenik WHERE imenik.mobilni = '$idBrisanja' OR imenik.fiksni = '$idBrisanja' OR imenik.poslovni = '$idBrisanja' OR imenik.ime = '$idBrisanja'";
		$result = mysqli_query($connect, $brisiSQL);	
		if($result)
			echo "Podaci su uspješno obrisani";
		else
			echo "Greška kod brisanja";

	}
	
	//----------------------------------------------------------------------------------------------------------------------------------------------

/*
	if (isset($_POST["trazi"] )){		
		
		$sql = mysqli_query($connect, "SELECT * FROM imenik") or die ("Error kod SELECTA");
		$json_array = array();
		
		while($row = mysqli_fetch_assoc($sql) ) {
			$json_array[] = $row;
		}
		print(json_encode($json_array));
		
		
	}*/





?>