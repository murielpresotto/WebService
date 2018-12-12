<?php
$conexao=mysqli_connect("localhost","root","","webservice");

?>
<html><head><meta charset="utf-8"/></head>
<body style="scroll-x:hidden;font-size:18px;" >

<table width='100%' ><tr><td>
  <div style='width:400px;height:330px;overflow-y:auto;' >

  <center>
  Lista de Produtos
	<table id="grid" name="grid" width="100%"  border style="font-family:verdana; font-size:15px;">
	 <div id="grid" name="grid" width="100%" align="left">
	 Nome - Quantidade - Valor - NCM
	 </div>
	  <?php
		$SQL = "select * from produtos  order by nomeprodutos";
		  // echo $SQL;
		$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
		while($RS = mysqli_fetch_array($RSS))
		{
			echo "<tr onClick='javascript:Clica(".$RS["idprodutos"].")' >";
			echo "<td>".$RS["nomeprodutos"]." / ".$RS["qtdprodutos"]." / ".$RS["valorprodutos"]." / ".$RS["ncm"]." </td>";
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

	if ( strlen($idprodutos) == 0 ) { $idprodutos =0; }

	$sql = "Select * from produtos where idprodutos = $idprodutos";
	//echo $sql;
	$RSS = mysqli_query($conexao,$sql)or print(mysqli_error());
	$RS = mysqli_fetch_assoc($RSS);	

	?>

</body>
</html>

