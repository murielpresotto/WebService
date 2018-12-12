<html
<head>
<title> Baixar excel</title>
</head>
<body>
  Download das informações
	<ul>
	<?php
		foreach(glob("uploads/*.*") as $v) {
			$name = basename($v);
			echo '<li><a href="download.php?file='.$name.'">'.$name.'</a></li>';
			}

	?>
	</ul>
</body>
</html>
<input value="Voltar" id="BtVoltar" name="BtVoltar"  type="button" onClick="window.open('menu.php','_self');" style="position: rigth; width: 90">