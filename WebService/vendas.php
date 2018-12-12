<?php
$conexao=mysqli_connect("localhost","root","","webservice");

?>
<html><head><meta charset="utf-8"/></head>
<body style="scroll-x:hidden;font-size:18px;" >

<table width='100%' ><tr><td>
  <div style='width:400px;height:330px;overflow-y:auto;' >

  <center>
  Lista das Vendas
	<table id="grid" name="grid" width="100%"  border style="font-family:verdana; font-size:15px;">
	<div id="grid" name="grid" width="100%" align="left">
	 Produto vendido - Qtd vendido - Valor
	 </div>
	  <?php	
		$SQL = "select * from vendas  order by produtodavenda";
		  // echo $SQL;
		$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
		while($RS = mysqli_fetch_array($RSS))
		{
			echo "<tr onClick='javascript:Clica(".$RS["idvenda"].")' >";
			echo "<td>".$RS["produtodavenda"]." / ".$RS["qtdvenda"]." / ".$RS["valorvenda"]." </td>";
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

	if ( strlen($idvenda) == 0 ) { $idvenda = 0; }

	$sql = "Select * from vendas where idvenda = $idvenda";
	//echo $sql;
	$RSS = mysqli_query($conexao,$sql)or print(mysqli_error());
	$RS = mysqli_fetch_assoc($RSS);	

	?>

</body>
</html>