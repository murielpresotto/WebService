<?php
$cone = mysqli_connect("localhost", "root", "","projeto") or print ( mysqli_connect_error() ); 
mysqli_set_charset($cone, "utf8");

$Content= "progid:DXImageTransform.Microsoft.Fade(duration=.10)";
$Fundo	= "margin:0px; background:#dbe1e6";

Function DataBR($dia)  { if (strlen($dia) > 3) return substr($dia,8,2)."-".substr($dia,5,2)."-".substr($dia,0,4)." ".substr($dia,11,10);  }
Function DataBD($dia)  { if (strlen($dia) > 3) return substr($dia,6,4)."-".substr($dia,3,2)."-".substr($dia,0,2)." ".substr($dia,11,10);  }
function DtBrToDtEua($DT, $TP)
{
	if($TP == 1)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$DtConvert = $Mes."/".$Dia."/".$Ano;
	}
	if($TP == 2)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$Horas = substr($DT,10,7);
		$DtConvert = $Mes."/".$Dia."/".$Ano.$Horas;
	}
	if($TP == 3)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$Horas = substr($DT,10,7);
		$DtConvert = $Ano."/".$Mes."/".$Dia;
	}
	return $DtConvert;
}
?>