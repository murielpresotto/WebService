<?php
session_start();
$ds_email	= $_POST["ds_email"];
$ds_senha	= $_POST["ds_senha"];
$txloga		= $_REQUEST["txloga"];

//echo $ds_email."=".$ds_senha;
If ($txloga == "0")  
{	
	$_SESSION['CD_NOME'] = '';
	session_destroy(); 	
}
else
{
	$ds_email  = str_replace("'","",$_POST["ds_email"]);
	$ds_senha  = str_replace("'","",$_POST["ds_senha"]);
	If ( ($ds_email == "0") || ($ds_senha == "0") ) {	session_destroy(); 	}
	If ( ($ds_email != "") && ($ds_senha != "") )
	{	
		include "conexaofuncoes.php";
		$SQL = "select * from cadastro where ds_email = '$ds_email' and ds_senha = '$ds_senha'";
	//	echo $SQL;/
		$RSS = $cone->query($SQL) or print(mysqli_connect_error());
		$RS = $RSS->fetch_assoc();	
		if( ($RS["ds_email"] == $ds_email) && ($RS["ds_senha"] == $_POST["ds_senha"]))
		{
			$_SESSION["CD_NOME"]	= $RS["cd_nome"];
			$_SESSION["DS_NOME"]	= $RS["ds_nome"];
			$_SESSION["DtLog"]		= date("d/m/Y H:i:s");
			echo "<script>window.open('index.php','_self');</script>";		
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">
    <title>Entrar</title>
    <link href="./login_files/bootstrap.min.css" rel="stylesheet">
    <link href="./login_files/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style='background-color:white'>
    <form class="form-signin" action="menu.php" method='post'>
      <a href='menu.php'><img class="mb-4" src="Imagem/log.jpg" width="210" height="200"></a>
      <h1 class="h3 mb-3 font-weight-normal">Entrar no sistema</h1>
      <label for="inputEmail" class="sr-only">CPF ou Email</label>
      <input type="text" id="ds_email" name="ds_email" class="form-control" placeholder="Email" required="" autofocus="" value="<?=$ds_email?>">
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="ds_senha" name="ds_senha" class="form-control" placeholder="Password" required="" value="<?=$ds_senha?>">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Manter Conectado
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	  <button onclick='window.open("cadastro.php","_self");' class="btn btn-lg btn-primary btn-block" type="submit">Cadastre-se</button>
      <p class="mt-5 mb-3 text-muted">©2018 Muriel</p>
    </form>  

</body></html>