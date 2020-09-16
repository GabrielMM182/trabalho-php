
<?php

require_once('conexao.php');

if(isset($_POST['nome']) && $_POST['nome'] != ""){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $documento = $_POST['documento'];
    $dataanascimento = $_POST['dataanascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    if($id == ""){
        $sql = "insert into mensagens (nome, documento, dataanascimento, cidade, estado, reg_datahora, alt_datahora)
            values ('$nome', '$documento', '$dataanascimento', '$cidade', '$estado', now(), '')
        ";
    }else{
        $sql = "update mensagens set nome = '$nome', documento = '$documento', dataanascimento = '$dataanascimento', cidade = '$cidade', estado = '$estado', alt_datahora = NOW()
                where id = ".$id;
    }
    
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && $id==""){
        $_GET['msg'] = 'Dados inseridos com sucesso';
        $_POST = null;
    }elseif($resultado && $id!=""){
        $_GET['msg'] = 'Dados alterados com sucesso';
        $_POST = null;
    }elseif(!$resultado){
        $_GET['msg'] = 'Falha ao inserir a mensagem';
    }
}

if(isset($_GET['msg']) && $_GET['msg'] != ""){
    echo $_GET['msg'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Mensagens Enviadas</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<h1 class="centro">CADASTRO DE CLIENTES</h1>
<p align=center> <a href="formulario-cliente.php">Cadastrar clientes</a></p>

<table border=1 width=80% align=center><tr>
    <td><label for="nome">Nome:</label></td>
    <td><label for="documento ">documento :</label></td>
    <td><label for="datanascimento">data nascimento:</label></td>        
    <td><label for="cidade ">cidade :</label></td>
    <td><label for="estado ">estado </label></td>
</tr>


<?php
    $sql = "select id, nome, documento , dataanascimento , estado , mensagem from mensagens ";
    $resultado = mysqli_query($conexao, $sql);

    while($dados = mysqli_fetch_array($resultado)){
        echo '<tr><td>'.$dados['nome'].'</td>
              <td>'.$dados['documento '].'</td>
              <td>'.$dados['dataanascimento '].'</td>        
              <td>'.$dados['telefone'].'</td>
              <td>'.$dados['estado '].'</td>
              <td>
                <a href="excluir-cliente.php?id='.$dados['id'].'">Excluir</a>
                <a href="formulario-cliente.php?id='.$dados['id'].'">Alterar</a>
              </td></tr>';
    }

    mysqli_close($conexao);

?>

</table>
<p align=center> <a href="formulario-cliente.php">Cadastrar</a></p>
</body>
</html>