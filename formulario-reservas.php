<?php

	require_once('conexao.php');
	
	$idquarto = '';
	$idcliente  = '';
	$dataaentrada  = '';
    $dataasaida = '';
    $valorreserva = '';
	$dataasaida = '';
	$statusreserva = '';
	$dataahora = '';

	$id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$sql = "select * from quartos where id = ".$_GET['id'];
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$idquarto = $dados['idquarto'];
			$idcliente  = $dados['idcliente '];
			$dataaentrada  = $dados['dataaentrada '];
            $valorreserva = $dados['valorreserva'];
            $valorreserva = $dados['dataasaida'];
            $valorreserva = $dados['statusreserva'];
            $valorreserva = $dados['dataahora'];
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
            <label for="idquarto">id do quarto:</label>
            <input type="number" id="idquarto" name="idquarto" value="<?php echo $idquarto; ?>" placeholder="id de quarto*" required>
        </div>
        
        <div class="field">
            <label for="idcliente">id cliente :</label>
            <input type="text" id="idcliente " name="idcliente " value="<?php echo $idcliente ; ?>" placeholder="id cliente?">
        </div>
 
        <div class="field">
            <label for="dataaentrada ">Data de entrada:</label>
            <input type="number" id="dataaentrada " name="dataaentrada " value="<?php echo $dataaentrada ; ?>" placeholder="data de entrada*" required>
        </div>        

        <div class="field">
            <label for="statuss  ">Status de reserva:</label>
            <input type="text" id="statusreserva  " name="statusreserva  " value="<?php echo $statusreserva  ; ?>" placeholder="statusreserva*" required>
        </div>

        <div class="field">
            <label for="dataahora  ">dataahora:</label>
            <input type="text" id="dataahora  " name="dataahora  " value="<?php echo $dataahora  ; ?>" placeholder="dataahora*" required>
        </div>

 
        <input type="submit" name="quartos" value="Enviar">
    </form>
</div>
</body>
</html>