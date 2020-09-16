<?php

	require_once('conexao.php');
	
	$id = $_GET['id'];
	

    
    if($id != ""){
		
		$sql = "delete from reservas where id = ".$id;
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$msg = "Dados reservas com sucesso!";
		}
		echo "<script>window.location.href='reservas.php?msg=$msg';</script>";
		
	}
	
?>