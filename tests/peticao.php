<?php
include('requerente.php');
include('requerido.php');



Class peticao{
	$nome = $_POST['nome'];
	$BI = $_POST['id'];
	$Nacionalidade=$_POST['nacio'];
	$Domicilio=$_POST['domi'];
	$tel=$_POST['tel'];
	$Representante=$_POST['repr'];
    $Instituicao=$_POST['Instituicao'];
    $Ministerio=$_POST['mini'];
	$obj= new requerente($nome,$BI,$Nacionalidade,$Domicilio,$tel,$Representante);
    $req= new requerido($Instituicao, $Ministerio);

}





?>