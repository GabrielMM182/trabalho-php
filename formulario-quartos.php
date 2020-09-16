<?php

	require_once('conexao.php');
	
	$numeroporta = '';
	$tipoquarto  = '';
	$valor  = '';
	$statuss = '';
	$id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$sql = "select * from quartos where id = ".$_GET['id'];
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$numeroporta = $dados['numeroporta'];
			$tipoquarto  = $dados['tipoquarto '];
			$valor  = $dados['valor '];
			$statuss = $dados['statuss'];
			$id = $dados['id'];
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário quartos</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background-color = "gray">
    <div width=60% class="centro">
    <form class="formulario" method="post" action="formulario.php" align=left> 
        <p> preenchendo o formulário abaixo</p>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="field">
            <label for="numeroporta">Numero da porta:</label>
            <input type="number" id="numeroporta" name="numeroporta" value="<?php echo $numeroporta; ?>" placeholder="Numero da porta*" required>
        </div>
        
        <div class="field">
            <label for="tipoquarto">Tipo do quarto :</label>
            <input type="text" id="tipoquarto " name="tipoquarto " value="<?php echo $tipoquarto ; ?>" placeholder="Tipo do quarto?">
        </div>
 
        <div class="field">
            <label for="valor ">Valor:</label>
            <input type="number" id="valor " name="valor " value="<?php echo $valor ; ?>" placeholder="valor*" required>
        </div>        

        <div class="field">
            <label for="statuss  ">Status:</label>
            <input type="text" id="statuss  " name="statuss  " value="<?php echo $statuss  ; ?>" placeholder="status*" required>
        </div>

 
        <input type="submit" name="quartos" value="Enviar">
    </form>
</div>
</body>
</html>