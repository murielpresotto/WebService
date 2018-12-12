<?php
$conexao=mysqli_connect("localhost","root","","webservice");

?>
<html><head><meta charset="utf-8"/></head>
<body style="scroll-x:hidden;font-size:18px;" >

<table width='100%' ><tr><td>
  <div style='width:400px;height:330px;overflow-y:auto;' >

  <center>
  Listagem de Motocicletas
	<table id="grid" name="grid" width="100%"  border style="font-family:verdana; font-size:15px;">
	<div id="grid" name="grid" width="100%" align="left">
	 Nome - Modelo - Valor
	 </div>
	  <?php	
		$SQL = "select * from motocicletas  order by nomemotocicleta";
		  // echo $SQL;
		$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
		while($RS = mysqli_fetch_array($RSS))
		{
			echo "<tr onClick='javascript:Clica(".$RS["idmotocicleta"].")' >";
			echo "<td>".$RS["nomemotocicleta"]." / ".$RS["modelomotocicleta"]." / ".$RS["valormotocicleta"]." </td>";
			echo "</tr>\n";
			$xx++;
		}
	   ?>
	</table>
	</center>

  </div>
	<?php echo "<left>".$xx ." registros</left>"; ?>

</td><td valign=top align='right'>

	<?php

	if ( strlen($idmotocicleta) == 0 ) { $idmotocicleta = 0; }

	$sql = "Select * from motocicletas where idmotocicleta = $idmotocicleta";
	//echo $sql;
	$RSS = mysqli_query($conexao,$sql)or print(mysqli_error());
	$RS = mysqli_fetch_assoc($RSS);	

	?>

</body>
</html>