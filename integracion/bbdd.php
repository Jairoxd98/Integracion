<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/bitcoins.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Date</th>
								<th class="column2">Low</th>
								<th class="column3">High</th>
								<th class="column4">Country</th>
								<th class="column5">Evaluation1</th>
								<th class="column6">Evaluation2</th>
							</tr>
						</thead>
						<tbody>
<?php

$mysqli = new mysqli('localhost', 'root', '', 'integracion');

if($mysqli -> connect_error){
    die("Connection failed: " . $mysqli->connect_error);
}else{
    
    if(isset($_POST["crypto"]) && ($_POST["dateInit"]) != "" && ($_POST["dateEnd"])!= ""){
        $sql="";$num = "100";
        if($_POST["country"] != "Selecciona tu opcion" && $_POST["evaluation"] == "Selecciona tu opcion" && $_POST["volatility"] == "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND country='".$_POST['country']."' limit ".$num."";
        }
        else if($_POST["evaluation"] != "Selecciona tu opcion" && $_POST["country"] == "Selecciona tu opcion" && $_POST["volatility"] == "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND evaluation='".$_POST['evaluation']."' limit ".$num."";
        }
        else if($_POST["evaluation"] == "Selecciona tu opcion" && $_POST["country"] == "Selecciona tu opcion" && $_POST["volatility"] != "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND volatility='".$_POST['volatility']."' limit ".$num."";
        }
        else if($_POST["evaluation"] != "Selecciona tu opcion" && $_POST["country"] != "Selecciona tu opcion" && $_POST["volatility"] == "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND country='".$_POST['country']."' AND evaluation='".$_POST['evaluation']."' limit ".$num."";
        }
        else if($_POST["evaluation"] != "Selecciona tu opcion" && $_POST["country"] == "Selecciona tu opcion" && $_POST["volatility"] != "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND volatility='".$_POST['volatility']."' AND evaluation='".$_POST['evaluation']."' limit ".$num."";
        }
        else if($_POST["evaluation"] == "Selecciona tu opcion" && $_POST["country"] != "Selecciona tu opcion" && $_POST["volatility"] != "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND volatility='".$_POST['volatility']."' AND country='".$_POST['country']."' limit ".$num."";
        }
        else if($_POST["evaluation"] != "Selecciona tu opcion" && $_POST["country"] != "Selecciona tu opcion" && $_POST["volatility"] != "Selecciona tu opcion"){
            $sql= "SELECT p.*, e.* FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` AND volatility='".$_POST['volatility']."' AND country='".$_POST['country']."' AND evaluation='".$_POST['evaluation']."' limit ".$num."";
        }
        else{
            $sql= "SELECT p.*, e.*  FROM ".$_POST['crypto']." p, eventoseconomicos e WHERE `EVENT DATE` BETWEEN '".$_POST['dateInit']."' AND '".$_POST['dateEnd']."' AND p.DATE=`EVENT DATE` limit ".$num."";
        }
        $resultado = $mysqli->query($sql);
        while($fila= $resultado->fetch_assoc()){
            echo"<tr>
            <td class=\"column1\">".$fila['DATE']."</td>
            <td class=\"column2\">".$fila['LOW']."</td>
            <td class=\"column3\">".$fila['HIGH']."</td>
            <td class=\"column4\">".$fila['COUNTRY']."</td>
            <td class=\"column5\">".$fila['EVALUATION']."</td>
            <td class=\"column6\">".$fila['VOLATILITY']."</td>
        </tr>";
        }
    }else{
        echo "<h1>Tanto la cryptomoneda como la fecha de inicio y final son obligatorios, por favor vuelva a intentarlo.</h1><br>";
    }
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>




<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
