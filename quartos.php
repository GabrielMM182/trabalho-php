
<?php

require_once('conexao.php');

if(isset($_POST['nome']) && $_POST['nome'] != ""){

    $id = $_POST['id'];
    $numeroporta = $_POST['numeroporta'];
    $tipoquarto = $_POST['tipoquarto'];
    $valor = $_POST['valor'];
    $statuss = $_POST['statuss'];


    if($id == ""){
        $sql = "insert into reservas (numeroporta, tipoquarto, valor, statuss,  reg_datahora, alt_datahora)
            values ('$numeroporta', '$tipoquarto', '$valor', '$statuss', now(), '')
        ";
    }else{
        $sql = "update reservas set numeroporta = '$numeroporta', tipoquarto = '$tipoquarto', valor = '$valor', statuss = '$statuss', alt_datahora = NOW()
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
        $_GET['msg'] = 'Falha ao inserir os quartos';
    }
}

if(isset($_GET['msg']) && $_GET['msg'] != ""){
    echo $_GET['msg'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Quartos Enviadas</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class="centro">CADASTRO DE QUARTOS</h1>
<p align=center> <a href="formulario-cliente.php">Cadastrar clientes</a></p>

<table border=1 width=80% align=center><tr>
    <td><label for="numeroporta">numero da porta:</label></td>
    <td><label for="tipoquarto ">tipo do quarto :</label></td>
    <td><label for="valor">valor:</label></td>        
    <td><label for="statuss ">status :</label></td>

</tr>


<?php
    $sql = "select id, nome, documento , dataanascimento , estado , mensagem from mensagens ";
    $resultado = mysqli_query($conexao, $sql);

    while($dados = mysqli_fetch_array($resultado)){
        echo '<tr><td>'.$dados['idquarto'].'</td>
              <td>'.$dados['idcliente '].'</td>
              <td>'.$dados['dataaentrada '].'</td>        
              <td>'.$dados['dataasaida'].'</td>
              <td>'.$dados['valorreserva '].'</td>
              <td>'.$dados['statuserva '].'</td>
              <td>'.$dados['dataahora '].'</td>

              <td>
                <a href="excluir-reservas.php?id='.$dados['id'].'">Excluir</a>
                <a href="formulario-reservas.php?id='.$dados['id'].'">Alterar</a>
              </td></tr>';
    }

    mysqli_close($conexao);

?>

</table>
<p align=center> <a href="formulario-reservas.php">Cadastrar</a></p>
</body>
</html>