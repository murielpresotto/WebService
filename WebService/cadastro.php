<?php
$conexao=mysqli_connect("localhost","root","","webservice");
$xx=0;
$SQL="";
$Tipo=$_REQUEST['Tipo'];
$cd_nome=$_REQUEST['cd_nome'];
if ($Tipo == "excluir")
{
	$SS = "DELETE FROM cadastro where cd_nome=$cd_nome";	
	$RSS = mysqli_query($conexao,$SS) or print(mysqli_error());
}

if ($Tipo == "salva")
{
	$SQL = "select * from cadastro  where cd_nome = '". $cd_nome ."'";
	echo $SQL."<br>";
	$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
	$RSX = mysqli_fetch_assoc($RSS); 

	
	If ( $RSX["cd_nome"] == $cd_nome )
	{
		
	}
	Else
	{
		$SQL  = "Insert into cadastro (" ;	$SS2 = " VALUES ( ";
		$SQL .= " ds_nome, ";				$SS2 .= " '".str_replace("'","",$_POST['ds_nome'])."',";
		$SQL .= " ds_sobrenome, ";			$SS2 .= " '".str_replace("'","",$_POST['ds_sobrenome'])."',";
		$SQL .= " ds_email, ";				$SS2 .= " '".str_replace("'","",$_POST['ds_email'])."',";
		$SQL .= " ds_senha) ";				$SS2 .= " '".str_replace("'","",$_POST['ds_senha'])."')";
		$RSS = mysqli_query($conexao,$SQL.$SS2 ) or die($SQL.$SS2);

		$SQL = "select * from cadastro order by cd_nome desc limit 1";
		$RSS = mysqli_query($conexao,$SQL)or print(mysqli_error());
		$RSX = mysqli_fetch_assoc($RSS); 
		$cd_nome = $RSX["cd_nome"];
		echo "<script>alert('Registro Inserido. Codigo $cd_nome');</script>";
		echo "<script>window.open('login.php','_self');</script>";
	}
}

if(strlen($cd_nome)==0) { $cd_nome = 0; }

?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com.br/favicon.ico">

    <title>Cadastros</title>
    <link href="./Checkout_files/bootstrap.min.css" rel="stylesheet">
    <link href="./Checkout_files/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="Imagem/cad.jpg" alt="" width="150" height="150">
        <h2>Efetue seu Cadastro</h2>
        <p class="lead">Insira seus dados abaixo</p>
      </div>

		 <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Preencha o formulario</h4>
			<form name="forma" action="cadastro.php" method='post'>
			  <input type="hidden" name="cd_nome" id="cd_nome" value="<?php echo $cd_nome;?>">
				<input type="hidden" name="Tipo" id="Tipo" value="salva">
			

          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Nome</label>
                <input type="text" class="form-control" id="ds_nome" name="ds_nome" placeholder="Insira seu nome"  required=""> 
                <div class="invalid-feedback">
                  O nome precisa ser válido.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Sobrenome</label>
                <input type="text" class="form-control" id="ds_sobrenome" name="ds_sobrenome" placeholder="Insira seu sobrenome" required="">
                <div class="invalid-feedback">
                  O Sobrenome precisa ser válido.
                </div>
              </div>
			  <div class="col-md-6 mb-3">
              <label>Email (opcional)<span class="text-muted"></span></label>
              <input type="email" class="form-control" id="ds_email" name="ds_email" placeholder="Insira seu email" required="">
              <div class="invalid-feedback">
                Insira um e-mail válido.
              </div>
              </div>
            <div class="col-md-6 mb-3">
              <label>Senha</label>
              <input type="password" class="form-control" id="ds_senha" name="ds_senha" placeholder="Insira sua senha" required="">
              <div class="invalid-feedback">
               Informe seu endereço por favor.
              </div>
			  </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" value='salva' onclick='salva()'>Confirme seu cadastro</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2018 Muriel</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="http://getbootstrap.com.br/docs/4.0/examples/checkout/#">Privacy</a></li>
          <li class="list-inline-item"><a href="http://getbootstrap.com.br/docs/4.0/examples/checkout/#">Terms</a></li>
          <li class="list-inline-item"><a href="http://getbootstrap.com.br/docs/4.0/examples/checkout/#">Support</a></li>
        </ul>
      </footer>
    </div>

    <script src="./Checkout_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Checkout_files/popper.min.js.download"></script>
    <script src="./Checkout_files/bootstrap.min.js.download"></script>
    <script src="./Checkout_files/holder.min.js.download"></script>
    <script>
     
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

</body></html>