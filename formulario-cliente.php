<?php

	require_once('conexao.php');
	
	$nome = '';
	$documento  = '';
	$dataanascimento  = '';
	$novidades = '';
	$mensagem = '';
	$id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$sql = "select * from clientes where id = ".$_GET['id'];
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$nome = $dados['nome'];
			$documento  = $dados['documento '];
			$dataanascimento  = $dados['dataanascimento '];
			$novidades = $dados['novidades'];
			$mensagem = $dados['mensagem'];
			$id = $dados['id'];
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário clientes</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body background-color = "gray">
    <div width=60% class="centro">
    <form class="formulario" method="post" action="mensagens.php" align=left> 
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Digite seu nome*" required>
        </div>
        
        <div class="field">
            <label for="documento">Seu documento :</label>
            <input type="text" id="documento " name="documento " value="<?php echo $documento ; ?>" placeholder="Digite seu documento (RG ou CPF)">
        </div>
 
        <div class="field">
            <label for="dataanascimento ">Sua data de nascimneto:</label>
            <input type="date" id="dataanascimento " name="dataanascimento " value="<?php echo $dataanascimento ; ?>" placeholder="sua data de nascimento*" required>
        </div>        

        <div class="field">
            <label for="cidade  ">Sua cidade:</label>
            <input type="text" id="cidade  " name="cidade  " value="<?php echo $cidade  ; ?>" placeholder="sua cidade*" required>
        </div>

        <div class="field">
            <label for="estado ">Seu estado :</label>
            <input type="text" id="estado  " name="estado  " value="<?php echo $estado  ; ?>" placeholder="Digite seu estado">
        </div>
 
        <input type="submit" name="mensagens" value="Enviar">
    </form>
</div>
</body>
</html>